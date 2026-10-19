<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Event\Listener\Contract;

use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Event\MetaData\Workflow\ConfirmationContract\AwaitConfirmationContext;
use Jazzfreunde\App\Event\MetaData\Workflow\ConfirmationContract\PendingMetaData;
use Jazzfreunde\App\Service\Contract\ContractConfirmationRequestMailGeneratorInterface;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\HexToken;
use Jazzfreunde\App\Workflow\ConfirmationContract\TransitionsEnum;
use LogicException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Workflow\Attribute\AsEnteredListener;
use Symfony\Component\Workflow\Attribute\AsEnterListener;
use Symfony\Component\Workflow\Attribute\AsGuardListener;
use Symfony\Component\Workflow\Attribute\AsTransitionListener;
use Symfony\Component\Workflow\Event\EnteredEvent;
use Symfony\Component\Workflow\Event\EnterEvent;
use Symfony\Component\Workflow\Event\Event;
use Symfony\Component\Workflow\Event\GuardEvent;
use Symfony\Component\Workflow\Event\TransitionEvent;
use Symfony\Component\Workflow\WorkflowInterface;

/**
 * @psalm-api
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class ConfirmationContractListener implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    public const string WORKFLOW_NAME = 'confirmation_contract';

    /**
     * @param ManagerRegistry                                   $registry
     * @param MessageBusInterface                               $bus
     * @param ValidatorInterface                                $validator
     * @param WorkflowInterface                                 $confirmationContractStateMachine
     * @param ContractConfirmationRequestMailGeneratorInterface $mailGenerator
     */
    public function __construct(
        private ManagerRegistry $registry,
        private MessageBusInterface $bus,
        private ValidatorInterface $validator,
        private WorkflowInterface $confirmationContractStateMachine,
        private ContractConfirmationRequestMailGeneratorInterface $mailGenerator,
    ) {}

    /**
     * Send confirmation request to user.
     *
     * @param TransitionEvent $event
     *
     * @throws LogicException if the subject is not a ConfirmationContract
     */
    #[AsTransitionListener(
        workflow: self::WORKFLOW_NAME,
        transition: TransitionsEnum::AwaitConfirmation->value,
    )]
    public function onTransitionAwaitConfirmation(TransitionEvent $event): void
    {
        $contract = $event->getSubject();

        if (!$contract instanceof ConfirmationContract) {
            throw new LogicException('Invalid subject type');
        }

        $context = AwaitConfirmationContext::fromMetaData(
            validator: $this->validator,
            data: $event->getContext(),
        );

        $message = $this->mailGenerator->generate($contract, $context->email);
        $this->bus->dispatch($message);
    }

    /**
     * Block the transition if the confirmation token is expired.
     *
     * @param GuardEvent $event
     *
     * @throws LogicException if the subject is not a ConfirmationContract
     */
    #[AsGuardListener(
        workflow: self::WORKFLOW_NAME,
        transition: TransitionsEnum::Confirm->value,
    )]
    public function onGuardConfirmExpired(GuardEvent $event): void
    {
        $contract = $this->getContract($event);
        $metaData = PendingMetaData::fromMetaData(
            validator: $this->validator,
            data: $this->confirmationContractStateMachine
                ->getDefinition()
                ->getMetadataStore()
                ->getPlaceMetadata(ConfirmationStateEnum::Pending->value)
        );

        if (!$contract->isExpired($metaData->getTokenLifeTime())) {
            return;
        }

        $event->setBlocked(true, 'Confirmation token expired');
    }

    /**
     * Renew time and token of contract to restart the confirmation process on this contract.
     *
     * @param EnterEvent $event
     *
     * @throws LogicException if the subject is not a ConfirmationContract
     */
    #[AsEnterListener(
        workflow: self::WORKFLOW_NAME,
        place: ConfirmationStateEnum::New->value,
    )]
    public function onEnterNew(EnterEvent $event): void
    {
        $contract = $this->getContract($event);
        $contract->token = new HexToken();
        $contract->requestTime = new DateTimeImmutable();
    }

    /**
     * Log the state change of the contract.
     *
     * @param EnteredEvent $event
     *
     * @throws LogicException if the subject is not a ConfirmationContract
     */
    #[AsEnteredListener(
        workflow: self::WORKFLOW_NAME,
    )]
    public function onStateChanged(EnteredEvent $event): void
    {
        $contract = $this->getContract($event);
        $entityManager = $this->registry
            ->getManagerForClass(ConfirmationContract::class)
            ?? throw new LogicException(sprintf("Not entity manager found for class '%s'", ConfirmationContract::class));

        $entityManager->flush();
        $entityManager->clear();

        $this->logger?->debug(
            'Confirmation contract state changed',
            [
                'state' => $event->getTransition()?->getName() ?? 'unknown',
                'subject' => $contract,
            ]
        );
    }

    /**
     * Get the contract from the event.
     *
     * @param Event $event
     *
     * @return ConfirmationContract
     *
     * @throws LogicException if the subject is not a ConfirmationContract
     */
    private function getContract(Event $event): ConfirmationContract
    {
        $subject = $event->getSubject();
        if ($subject instanceof ConfirmationContract) {
            return $subject;
        }

        throw new LogicException(sprintf("Invalid subject type. Expected an instance of '%s'", ConfirmationContract::class));
    }
}
