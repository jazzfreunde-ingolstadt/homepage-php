<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Contract;

use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Contract\ConfirmableEntity;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\NewsletterSubscription;
use Jazzfreunde\App\Entity\Notification\NotificationSubscription;
use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Jazzfreunde\App\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use LogicException;
use Override;
use Symfony\Component\Mime\Address;

/**
 * Generates confirmation request emails for confirmable entities.
 *
 * @psalm-api
 */
final class ContractConfirmationRequestMailGenerator implements ContractConfirmationRequestMailGeneratorInterface
{
    private const DEFAULT_SUBJECT = 'Bitte bestätigen Sie Ihre Anmeldung';

    private const DEFAULT_TEMPLATE = 'email/contract/confirmation-request.html.twig';

    public function __construct(
        private readonly ManagerRegistry $registry,
    ) {}

    #[Override]
    public function generate(ConfirmationContract $contract, Email $recipient): EmailNotification
    {
        $entity = $this->findConfirmableEntity($contract);
        [$subject, $template] = match (true) {
            $entity instanceof NewsletterSubscription => [
                'Bestätigen Sie Ihre Newsletter Anmeldung',
                'email/newsletter/confirmation-request.html.twig',
            ],
            $entity instanceof NotificationSubscription => [
                'Bitte bestätigen Sie Ihre Anmeldung für Benachrichtigungen',
                'email/notifications/confirmation-request.html.twig',
            ],
            default => [self::DEFAULT_SUBJECT, self::DEFAULT_TEMPLATE],
        };

        return new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address($recipient->__toString()),
            subject: $subject,
            twigTemplate: $template,
            twigContext: ['token' => $contract->token],
        );
    }

    private function findConfirmableEntity(ConfirmationContract $contract): ?ConfirmableEntity
    {
        $metadata = $contract->metadata;
        if (empty($metadata)) {
            return null;
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

        $entityManager = $this->registry->getManagerForClass($entityClass)
            ?? throw new LogicException(sprintf("No entity manager found for class '%s'.", $entityClass));

        $entity = $entityManager->find($entityClass, $entityUuid);

        if (!$entity instanceof ConfirmableEntity) {
            throw new LogicException(sprintf(
                "Could not retrieve confirmable entity '%s' with UUID '%s'.",
                $entityClass,
                $entityUuid
            ));
        }

        return $entity;
    }
}
