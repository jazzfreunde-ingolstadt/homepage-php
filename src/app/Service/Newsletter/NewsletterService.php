<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Newsletter;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Exception\Newsletter\SubscriptionException;
use Jazzfreunde\App\Service\Contract\ConfirmationContractService;
use Jazzfreunde\App\Type\Primitive\Email;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use function count;

/**
 * Service zur Verwaltung des Newsletters
 */
final class NewsletterService
{
    /**
     * @param ManagerRegistry $registry
     * @param ValidatorInterface $validator
     * @param ConfirmationContractService $confirmationContracts
     */
    public function __construct(
        private ManagerRegistry $registry,
        private ValidatorInterface $validator,
        private ConfirmationContractService $confirmationContracts,
    ) {
    }

    /**
     * Process new subscription request.
     *
     * @return void
     * @throws SubscriptionException
     */
    public function subscribe(NewsletterSubscription $subscription): void
    {
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->token = ConfirmationContract::generateToken();
        $subscription->confirmation->requestTime = new \DateTimeImmutable();

        if (0 < count($this->validator->validate($subscription))) {
            throw new \DomainException('Invalid subscription data');
        }

        $connection = $this->registry->getConnection();
        $entityManager = $this->registry->getManagerForClass(NewsletterSubscription::class);
        
        $connection->beginTransaction();
        try {
            $entityManager->persist($subscription);
            $entityManager->flush();

            $this->confirmationContracts->startEmailConfirmation(
                $subscription->confirmation,
                $subscription->email
            );

            $connection->commit();
        } catch (UniqueConstraintViolationException $e) {
            $connection->rollback();
            $this->registry->resetManager();

            $subscription = $this->getSubscriptionByEmailOrNull($subscription->email);
            if ($subscription->confirmation->isConfirmed()) {
                throw new SubscriptionException(code: SubscriptionException::ALREADY_SUBSCRIBED);
            }

            $this->confirmationContracts->restartEmailConfirmation(
                $subscription->confirmation,
                $subscription->email
            );
        } catch (\Throwable $e) {
            $connection->rollback();
            throw new SubscriptionException(previous: $e);
        }
    }

    /**
     * Confirm the subscription.
     *
     * @param string $token Token of the confirmation contract
     * @return void
     */
    public function confirm(string $token): void
    {
        $this->confirmationContracts->confirmContract($token);
    }

    /**
     * Unsubscribe from the newsletter.
     *
     * @param string $token Token of the confirmation contract
     * @return void
     */
    public function unsubscribe(string $token): void
    {
        $this->confirmationContracts->cancelContract($token);
    }

    /**
     * @param Email $email unique email address
     * @return NewsletterSubscription|null
     */
    private function getSubscriptionByEmailOrNull(Email $email): ?NewsletterSubscription
    {
        return $this->registry
            ->getRepository(NewsletterSubscription::class)
            ->findOneBy(['email' => $email]);
    }
}
