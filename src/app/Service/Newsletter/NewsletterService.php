<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Newsletter;

use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Form\NewsletterSubscriptionType;
use Jazzfreunde\App\Service\Newsletter\Exception\SubscriptionException;
use Jazzfreunde\App\Event\Event\Newsletter\Subscription\NewSubscriptionEvent;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

use function count;

/**
 * Service zur Verwaltung des Newsletters
 */
final class NewsletterService
{
    /**
     * @param EntityManagerInterface $entityManager
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     * @param EventDispatcherInterface $dispatcher
     * @param ValidatorInterface $validator
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private FormFactoryInterface $formFactory,
        private UrlGeneratorInterface $urlGenerator,
        private EventDispatcherInterface $dispatcher,
        private ValidatorInterface $validator,
    ) {
    }

    /**
     * Verarbeitet ein neues Abonnement.
     *
     * @return void
     * @throws SubscriptionException
     */
    public function subscribe(NewsletterSubscription $subscription): void
    {
        $subscription->confirmation = ConfirmationContract::create();

        if (0 < count($this->validator->validate($subscription))) {
            throw new \DomainException('Invalid subscription data');
        }

        $this->entityManager->beginTransaction();
        try {
            $this->entityManager->persist($subscription);
            $this->entityManager->flush();

            $this->dispatcher->dispatch(new NewSubscriptionEvent($subscription));

            $this->entityManager->commit();
        } catch (UniqueConstraintViolationException $e) {
            throw new SubscriptionException(code: SubscriptionException::ALREADY_SUBSCRIBED);
        } catch (\Throwable $e) {
            $this->entityManager->rollback();
            throw new SubscriptionException(previous: $e);
        }
    }

    /**
     * Generiert das Formular.
     *
     * @return FormInterface
     */
    public function createForm(): FormInterface
    {
        return $this->formFactory->create(
            NewsletterSubscriptionType::class,
            options: [
                'action' => $this->urlGenerator->generate('form_newsletter_subscribe')
            ]
        );
    }
}
