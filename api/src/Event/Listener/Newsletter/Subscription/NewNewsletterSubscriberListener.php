<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Event\Listener\Newsletter\Subscription;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\Api\Entity\Contract\ConfirmableEntity;
use Jazzfreunde\Api\Entity\Contract\ConfirmationContract;
use Jazzfreunde\Api\Entity\NewsletterSubscription;
use Jazzfreunde\Api\Event\Listener\Contract\ConfirmationContractListener;
use Jazzfreunde\Api\Message\Messages\Email\EmailNotification;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Api\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use LogicException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Workflow\Attribute\AsEnterListener;
use Symfony\Component\Workflow\Event\EnterEvent;

/**
 * Notifies the Jazzletter mailbox when a newsletter subscription is confirmed.
 *
 * @psalm-api
 */
final class NewNewsletterSubscriberListener
{
    public function __construct(
        private readonly ManagerRegistry $registry,
        private readonly MessageBusInterface $messageBus,
    ) {}

    /**
     * @param EnterEvent<object> $event
     */
    #[AsEnterListener(
        workflow: ConfirmationContractListener::WORKFLOW_NAME,
        place: ConfirmationStateEnum::Confirmed->value,
    )]
    public function onEnterConfirmed(EnterEvent $event): void
    {
        $contract = $event->getSubject();
        if (!$contract instanceof ConfirmationContract) {
            throw new LogicException(sprintf(
                'Expected an instance of %s.',
                ConfirmationContract::class,
            ));
        }

        $metadata = $contract->metadata;
        if (empty($metadata)) {
            return;
        }

        $entityClass = $metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_CLASS] ?? null;
        $entityUuid = $metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_UUID] ?? null;
        if (
            !is_string($entityClass)
            || !is_string($entityUuid)
            || !is_a($entityClass, ConfirmableEntity::class, true)
        ) {
            throw new LogicException('Confirmation metadata must contain a valid confirmable entity class and UUID.');
        }

        if (!is_a($entityClass, NewsletterSubscription::class, true)) {
            return;
        }

        $entityManager = $this->registry->getManagerForClass($entityClass)
            ?? throw new LogicException(sprintf("No entity manager found for class '%s'.", $entityClass));
        $subscription = $entityManager->find($entityClass, $entityUuid);
        if (!$subscription instanceof NewsletterSubscription) {
            throw new LogicException(sprintf(
                "Could not retrieve newsletter subscription '%s' with UUID '%s'.",
                $entityClass,
                $entityUuid,
            ));
        }

        $this->messageBus->dispatch(new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: KnownMailHandleEnum::Jazzletter,
            subject: 'Neuer Newsletter Abonnent!',
            twigTemplate: EmailTemplatePath::NEWSLETTER_NEW_SUBSCRIBER_NOTICE,
            twigContext: [
                'subscription' => [
                    'email' => $subscription->email,
                ],
            ],
        ));
    }
}
