<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Event\Listener\Contract;

use DateTimeImmutable;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\Api\Entity\Contract\ConfirmationContract;
use Jazzfreunde\Api\Event\Listener\Contract\ConfirmationContractListener;
use Jazzfreunde\Api\Message\Messages\Email\EmailMessage;
use Jazzfreunde\Api\Service\Contract\ContractConfirmationRequestMailGeneratorInterface;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Api\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\Api\Type\Primitive\Email;
use Jazzfreunde\UnitTest\UnitUnderTest;
use LogicException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use stdClass;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Workflow\Definition;
use Symfony\Component\Workflow\Event\EnteredEvent;
use Symfony\Component\Workflow\Event\EnterEvent;
use Symfony\Component\Workflow\Event\GuardEvent;
use Symfony\Component\Workflow\Event\TransitionEvent;
use Symfony\Component\Workflow\Marking;
use Symfony\Component\Workflow\Metadata\MetadataStoreInterface;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\TransitionBlocker;
use Symfony\Component\Workflow\WorkflowInterface;

/**
 * Tests for the ConfirmationContract listener.
 *
 * @internal
 *
 * @coversNothing
 */
final class ConfirmationContractListenerTest extends TestCase
{
    /**
     * Test the onTransition event for AwaitConfirmation transition.
     */
    public function testOnTransitionAwaitConfirmation(): void
    {
        $contract = $this->newContract();
        $contract->state = ConfirmationStateEnum::Pending;
        $mail = new EmailMessage(
            sender: KnownMailHandleEnum::NoReply,
            recipient: new Address('test@mail.com'),
            subject: 'Bitte bestätigen Sie Ihre Anmeldung',
            twigTemplate: EmailTemplatePath::CONTRACT_CONFIRMATION_REQUEST,
            twigContext: ['token' => $contract->token],
        );

        $uut = new UnitUnderTest(ConfirmationContractListener::class);
        $uut->mock(ContractConfirmationRequestMailGeneratorInterface::class)
            ->expects($this->once())
            ->method('generate')
            ->with(
                $contract,
                $this->callback(static fn (Email $email): bool => 'test@mail.com' === $email->value())
            )
            ->willReturn($mail);
        $uut->mock(MessageBusInterface::class)
            ->expects($this->once())
            ->method('dispatch')
            ->with($mail)
            ->willReturn(new Envelope($mail));

        $event = $this->transitionEvent(
            $contract,
            $this->strictMock(WorkflowInterface::class),
            ['email' => 'test@mail.com'],
        );

        $listener = $uut->target();
        $listener->onTransitionAwaitConfirmation($event);

        $this->assertEquals(ConfirmationStateEnum::Pending, $contract->state, 'Contract state should be set to pending');
    }

    /**
     * Test GuardEvent with expired confirmation contract.
     */
    public function testOnGuardConfirmExpiredWitExpiredRequest(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $contract = $this->newContract();
        $contract->state = ConfirmationStateEnum::Pending;
        $contract->requestTime = new DateTimeImmutable('-1 days');

        $workflow = $this->mockWorkflow($uut, [
            'token_lifetime' => '10 minutes',
        ]);

        $event = $this->guardEvent($contract, $workflow);

        $listener = $uut->target();
        $listener->onGuardConfirmExpired($event);

        $this->assertTrue($event->isBlocked(), 'Event should be blocked');
        $transitionBlockerList = $event->getTransitionBlockerList();
        $this->assertCount(1, $transitionBlockerList, 'There should be one transition blocker');

        $blocker = null;
        foreach ($transitionBlockerList as $transitionBlocker) {
            $blocker = $transitionBlocker;

            break;
        }
        self::assertInstanceOf(TransitionBlocker::class, $blocker);
        $this->assertEquals('Confirmation token expired', $blocker->getMessage(), "Blocker reason should be 'Confirmation token expired'");
    }

    /**
     * Test GuardEvent with valid confirmation contract.
     */
    public function testOnGuardConfirmExpiredWhereTokenHasNotExpired(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $contract = $this->newContract();
        $contract->state = ConfirmationStateEnum::Pending;
        $contract->requestTime = new DateTimeImmutable('-1 minutes');

        $metaDataStore = $this->createMock(MetadataStoreInterface::class);
        $metaDataStore
            ->expects($this->once())
            ->method('getPlaceMetadata')
            ->with($this->equalTo(ConfirmationStateEnum::Pending->value))
            ->willReturn([
                'token_lifetime' => '10 minutes',
            ]);

        $definition = new Definition(
            places: [],
            transitions: [],
            initialPlaces: null,
            metadataStore: $metaDataStore,
        );

        $workflow = $uut->mock(WorkflowInterface::class);
        $workflow
            ->expects($this->once())
            ->method('getDefinition')
            ->willReturn($definition);

        $event = $this->guardEvent($contract, $workflow);

        $listener = $uut->target();
        $listener->onGuardConfirmExpired($event);

        $this->assertFalse($event->isBlocked(), 'Event should not be blocked');
    }

    /**
     * Test GuardEvent with invalid subject.
     */
    public function testOnGuardConfirmExpiredWithInvalidSubject(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $event = $this->guardEvent(new stdClass());

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("Invalid subject type. Expected an instance of 'Jazzfreunde\\Api\\Entity\\Contract\\ConfirmationContract'");

        $listener = $uut->target();
        $listener->onGuardConfirmExpired($event);
    }

    /**
     * Test a contract entering the 'new' state.
     */
    public function testOnEnterNew(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $contract = $this->newContract();

        $event = $this->enterEvent($contract);

        $uuid = $contract->uuid;
        $token = $contract->token;
        $requestTime = $contract->requestTime;

        $listener = $uut->target();
        $listener->onEnterNew($event);

        $this->assertEquals($uuid, $contract->uuid, 'UUID should not be changed');
        $this->assertNotEquals($token, $contract->token, 'Token should be regenerated');
        $this->assertNotEquals($requestTime, $contract->requestTime, 'Request time should be set to current time');
    }

    /**
     * Test a contract entering the 'new' state with an invalid subject.
     */
    public function testOnEnterNewWithInvalidSubject(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $event = $this->enterEvent(new stdClass());

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("Invalid subject type. Expected an instance of 'Jazzfreunde\\Api\\Entity\\Contract\\ConfirmationContract'");

        $listener = $uut->target();
        $listener->onEnterNew($event);
    }

    /**
     * Test a state change on the confirmation contract.
     */
    public function testOnStageChange(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $objectManager = $uut->mock(ObjectManager::class);
        $objectManager
            ->expects($this->once())
            ->method('flush');
        $objectManager
            ->expects($this->once())
            ->method('clear');

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getManagerForClass')
            ->with($this->equalTo(ConfirmationContract::class))
            ->willReturn($objectManager);

        $contract = $this->newContract();

        $event = $this->enteredEvent($contract);

        $uuid = $contract->uuid;
        $token = $contract->token;

        $listener = $uut->target();
        $listener->onStateChanged($event);

        $this->assertEquals($uuid, $contract->uuid, 'UUID should not be changed');
        $this->assertEquals($token, $contract->token, 'Token should not be changed');
    }

    /**
     * Test a state change where the subject is not a confirmation contract.
     */
    public function testOnStageChangeWithInvalidSubject(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $event = $this->enteredEvent(new stdClass());

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage("Invalid subject type. Expected an instance of 'Jazzfreunde\\Api\\Entity\\Contract\\ConfirmationContract'");

        $listener = $uut->target();
        $listener->onStateChanged($event);
    }

    /**
     * Create a new confirmation contract.
     *
     * @return ConfirmationContract
     */
    private function newContract(): ConfirmationContract
    {
        $contract = new ConfirmationContract();
        $contract->requestTime = new DateTimeImmutable();

        return $contract;
    }

    /**
     * Mock the workflow.
     *
     * @param UnitUnderTest<ConfirmationContractListener> $uut
     * @param array<string, mixed>                        $metaData
     *
     * @return MockObject&WorkflowInterface
     */
    private function mockWorkflow(
        UnitUnderTest $uut,
        array $metaData,
    ): MockObject&WorkflowInterface {
        $metaDataStore = $this->createMock(MetadataStoreInterface::class);
        $metaDataStore
            ->expects($this->atMost(1))
            ->method('getPlaceMetadata')
            ->willReturn($metaData);
        $metaDataStore
            ->expects($this->atMost(1))
            ->method('getTransitionMetadata')
            ->willReturn($metaData);

        $definition = new Definition(
            places: [],
            transitions: [],
            initialPlaces: null,
            metadataStore: $metaDataStore,
        );

        $workflow = $uut->mock(WorkflowInterface::class);
        $workflow
            ->expects($this->once())
            ->method('getDefinition')
            ->willReturn($definition);

        return $workflow;
    }

    /**
     * @param array<string, mixed> $context
     *
     * @return TransitionEvent<object>
     */
    private function transitionEvent(
        object $subject,
        WorkflowInterface $workflow,
        array $context = [],
    ): TransitionEvent {
        return new TransitionEvent(
            subject: $subject,
            marking: $this->strictMock(Marking::class),
            transition: $this->strictMock(Transition::class),
            workflow: $workflow,
            context: $context,
        );
    }

    /**
     * @return GuardEvent<object>
     */
    private function guardEvent(
        object $subject,
        ?WorkflowInterface $workflow = null,
    ): GuardEvent {
        return new GuardEvent(
            subject: $subject,
            marking: $this->strictMock(Marking::class),
            transition: $this->strictMock(Transition::class),
            workflow: $workflow,
        );
    }

    /**
     * @return EnterEvent<object>
     */
    private function enterEvent(object $subject): EnterEvent
    {
        return new EnterEvent(
            subject: $subject,
            marking: $this->strictMock(Marking::class),
        );
    }

    /**
     * @return EnteredEvent<object>
     */
    private function enteredEvent(object $subject): EnteredEvent
    {
        return new EnteredEvent(
            subject: $subject,
            marking: $this->strictMock(Marking::class),
        );
    }

    /**
     * Create a mock that must not be called.
     *
     * @template T of object
     *
     * @param class-string<T> $class
     *
     * @return MockObject&T
     */
    private function strictMock(string $class): MockObject
    {
        $mock = $this->createMock($class);
        $mock
            ->expects($this->never())
            ->method($this->anything());

        return $mock;
    }
}
