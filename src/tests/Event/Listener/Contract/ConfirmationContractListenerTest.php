<?php declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Event\Listener\Contract;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Event\Listener\Contract\ConfirmationContractListener;
use Jazzfreunde\App\Message\Messages\Email\EmailNotification;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Workflow\Definition;
use Symfony\Component\Workflow\Event\EnteredEvent;
use Symfony\Component\Workflow\Event\EnterEvent;
use Symfony\Component\Workflow\Event\GuardEvent;
use Symfony\Component\Workflow\Event\TransitionEvent;
use Symfony\Component\Workflow\Marking;
use Symfony\Component\Workflow\Metadata\MetadataStoreInterface;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\WorkflowInterface;
use Symfony\Component\Workflow\TransitionBlocker;

/**
 * Tests for the ConfirmationContract listener.
 */
final class ConfirmationContractListenerTest extends TestCase
{
    use MockingTrait;

    /**
     * Test the onTransition event for AwaitConfirmation transition.
     *
     * @return void
     */
    public function testOnTransitionAwaitConfirmation(): void
    {
        $contract = $this->newContract();

        $uut = new UnitUnderTest(ConfirmationContractListener::class);
        $uut->mock(MessageBusInterface::class)
            ->expects($this->once())
            ->method('dispatch')
            ->with($this->callback(function (EmailNotification $message) use ($contract): bool {
                return $message->subject == 'Test subject'
                    && $message->twigTemplate == 'test.html.twig'
                    && $message->twigContext == [ 'token' => $contract->token ];
            }))
            ->willReturn(new Envelope($this->mock(EmailNotification::class)));

        $workflow = $this->mockWorkflow([
            'email_subject' => 'Test subject',
            'email_template' => 'test.html.twig',
        ]);

        $event = new TransitionEvent(
            subject: $contract,
            marking: $this->mock(Marking::class),
            transition: $this->mock(Transition::class),
            workflow: $workflow,
            context: [
                'email' => 'test@mail.com',
            ],
        );

        $listener = $uut->target();
        $listener->onTransitionAwaitConfirmation($event);
    }

    /**
     * Test GuardEvent with expired confirmation contract
     *
     * @return void
     */
    public function testOnGuardConfirmExpiredWitExpiredRequest(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $contract = $this->newContract();
        $contract->state = ConfirmationStateEnum::Pending;
        $contract->requestTime = new \DateTimeImmutable('-1 days');

        $workflow = $this->mockWorkflow([
            'token_lifetime' => '10 minutes',
        ]);

        $event = new GuardEvent(
            subject: $contract,
            marking: $this->mock(Marking::class),
            transition: $this->mock(Transition::class),
            workflow: $workflow,
        );

        $listener = $uut->target();
        $listener->onGuardConfirmExpired($event);

        $this->assertTrue($event->isBlocked(), "Event should be blocked");
        $transitionBlockerList = $event->getTransitionBlockerList();
        $this->assertCount(1, $transitionBlockerList, "There should be one transition blocker");

        /** @var TransitionBlocker&\ArrayIterator $blocker */
        $blocker = $transitionBlockerList->getIterator();
        $this->assertEquals('Confirmation token expired', $blocker->current()->getMessage(), "Blocker reason should be 'Confirmation token expired'");
    }

    /**
     * Test GuardEvent with valid confirmation contract
     *
     * @return void
     */
    public function testOnGuardConfirmExpiredWhereTokenHasNotExpired(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $contract = $this->newContract();
        $contract->state = ConfirmationStateEnum::Pending;
        $contract->requestTime = new \DateTimeImmutable('-1 minutes');

        $metaDataStore = $this->mock(MetadataStoreInterface::class);
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

        $workflow = $this->mock(WorkflowInterface::class);
        $workflow
            ->expects($this->once())
            ->method('getDefinition')
            ->willReturn($definition);

        $event = new GuardEvent(
            subject: $contract,
            marking: $this->mock(Marking::class),
            transition: $this->mock(Transition::class),
            workflow: $workflow,
        );

        $listener = $uut->target();
        $listener->onGuardConfirmExpired($event);

        $this->assertFalse($event->isBlocked(), "Event should not be blocked");
    }

    /**
     * Test GuardEvent with invalid subject.
     *
     * @return void
     */
    public function testOnGuardConfirmExpiredWithInvalidSubject(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $event = new GuardEvent(
            subject: new \stdClass(),
            marking: $this->mock(Marking::class),
            transition: $this->mock(Transition::class),
        );

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid subject type. Expected an instance of Jazzfreunde\App\Entity\Contract\ConfirmationContract');

        $listener = $uut->target();
        $listener->onGuardConfirmExpired($event);
    }

    /**
     * Test a contract entering the 'new' state.
     *
     * @return void
     */
    public function testOnEnterNew(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $contract = $this->newContract();

        $event = new EnterEvent(
            subject: $contract,
            marking: $this->mock(Marking::class),
        );

        $uuid = $contract->uuid;
        $token = $contract->token;
        $requestTime = $contract->requestTime;

        $listener = $uut->target();
        $listener->onEnterNew($event);

        $this->assertEquals($uuid, $event->getSubject()->uuid, "UUID should not be changed");
        $this->assertNotEquals($token, $event->getSubject()->token, "Token should be regenerated");
        $this->assertNotEquals($requestTime, $event->getSubject()->requestTime, "Request time should be set to current time");
    }

    /**
     * Test a contract entering the 'new' state with an invalid subject.
     *
     * @return void
     */
    public function testOnEnterNewWithInvalidSubject(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $event = new EnterEvent(
            subject: new \stdClass(),
            marking: $this->mock(Marking::class),
        );

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid subject type. Expected an instance of Jazzfreunde\App\Entity\Contract\ConfirmationContract');

        $listener = $uut->target();
        $listener->onEnterNew($event);
    }

    /**
     * Test a state change on the confirmation contract.
     *
     * @return void
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
            ->method('clear')
            ->with(ConfirmationContract::class);

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getManagerForClass')
            ->with($this->equalTo(ConfirmationContract::class))
            ->willReturn($objectManager);

        $contract = $this->newContract();

        $event = new EnteredEvent(
            subject: $contract,
            marking: $this->mock(Marking::class),
        );

        $uuid = $contract->uuid;
        $token = $contract->token;

        $listener = $uut->target();
        $listener->onStateChanged($event);

        $this->assertEquals($uuid, $event->getSubject()->uuid, "UUID should not be changed");
        $this->assertEquals($token, $event->getSubject()->token, "Token should not be changed");
    }

    /**
     * Test a state change where the subject is not a confirmation contract.
     *
     * @return void
     */
    public function testOnStageChangeWithInvalidSubject(): void
    {
        $uut = new UnitUnderTest(ConfirmationContractListener::class);

        $event = new EnteredEvent(
            subject: new \stdClass(),
            marking: $this->mock(Marking::class),
        );

        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('Invalid subject type. Expected an instance of Jazzfreunde\App\Entity\Contract\ConfirmationContract');

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
        $contract->requestTime = new \DateTimeImmutable();
        $contract->token = ConfirmationContract::generateToken();

        return $contract;
    }

    /**
     * Mock the workflow.
     *
     * @return WorkflowInterface&MockObject
     */
    private function mockWorkflow(array $metaData): WorkflowInterface&MockObject
    {
        $metaDataStore = $this->mock(MetadataStoreInterface::class);
        $metaDataStore
            ->method('getPlaceMetadata')
            ->willReturn($metaData);
        $metaDataStore
            ->method('getTransitionMetadata')
            ->willReturn($metaData);

        $definition = new Definition(
            places: [],
            transitions: [],
            initialPlaces: null,
            metadataStore: $metaDataStore,
        );

        $workflow = $this->mock(WorkflowInterface::class);
        $workflow
            ->expects($this->once())
            ->method('getDefinition')
            ->willReturn($definition);

        return $workflow;
    }
}
