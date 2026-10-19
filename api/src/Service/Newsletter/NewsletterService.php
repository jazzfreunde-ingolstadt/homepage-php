<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Newsletter;

use Doctrine\DBAL\Driver\Connection;
use Doctrine\Persistence\ManagerRegistry;
use DomainException;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Exception\Newsletter\SubscriptionException;
use Jazzfreunde\App\Service\Contract\ConfirmationContractService;
use Jazzfreunde\App\Type\Primitive\Email;
use LogicException;
use RuntimeException;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Throwable;

use function count;

/**
 * Service zur Verwaltung des Newsletters.
 */
final class NewsletterService
{
    /**
     * @param ManagerRegistry             $registry
     * @param ValidatorInterface          $validator
     * @param ConfirmationContractService $confirmationContracts
     *
     * @psalm-api
     */
    public function __construct(
        private ManagerRegistry $registry,
        private ValidatorInterface $validator,
        private ConfirmationContractService $confirmationContracts,
    ) {}

    /**
     * Process new subscription request.
     *
     * @throws SubscriptionException
     */
    public function subscribe(NewsletterSubscription $subscription): void
    {
        $violations = $this->validator->validate($subscription);
        if (0 < count($violations)) {
            foreach ($violations as $violation) {
                if (
                    $violation->getConstraint() instanceof UniqueEntity
                    && 'email' === $violation->getPropertyPath()
                ) {
                    $this->restartExistingSubscription($subscription->email);

                    return;
                }
            }

            throw new DomainException('Invalid subscription data');
        }

        $subscription->confirmation = new ConfirmationContract();

        /**
         * @var Connection $connection
         */
        $connection = $this->registry->getConnection();
        $entityManager = $this->registry
            ->getManagerForClass(NewsletterSubscription::class)
            ?? throw new LogicException(sprintf("Not entity manager found for class '%s'", NewsletterSubscription::class));

        $connection->beginTransaction();

        try {
            $entityManager->persist($subscription);
            $entityManager->flush();

            $subscription->confirmation->setConfirmableEntity($subscription);
            $this->confirmationContracts->startEmailConfirmation(
                $subscription->confirmation,
                $subscription->email
            );

            $connection->commit();
        } catch (Throwable $e) {
            $connection->rollback();

            throw new SubscriptionException(previous: $e);
        }
    }

    /**
     * Confirm the subscription.
     *
     * @param string $token Token of the confirmation contract
     */
    public function confirm(string $token): void
    {
        $this->confirmationContracts->confirmContract($token);
    }

    /**
     * Unsubscribe from the newsletter.
     *
     * @param string $token Token of the confirmation contract
     */
    public function unsubscribe(string $token): void
    {
        $this->confirmationContracts->cancelContract($token);
    }

    /**
     * @param Email $email unique email address
     *
     * @return NewsletterSubscription
     */
    private function getSubscriptionByEmail(Email $email): NewsletterSubscription
    {
        return $this->registry
            ->getRepository(NewsletterSubscription::class)
            ->findOneBy(['email' => $email])
            ?? throw new RuntimeException("Subscription for email '{$email}' not found");
    }

    private function restartExistingSubscription(Email $email): void
    {
        $subscription = $this->getSubscriptionByEmail($email);
        if ($subscription->confirmation->isConfirmed()) {
            throw new SubscriptionException(code: SubscriptionException::ALREADY_SUBSCRIBED);
        }

        $subscription->confirmation->setConfirmableEntity($subscription);
        $this->confirmationContracts->restartEmailConfirmation(
            $subscription->confirmation,
            $subscription->email
        );
    }
}
