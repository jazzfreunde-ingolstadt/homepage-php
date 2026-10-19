<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Event\Listener\Api\Contract;

use Jazzfreunde\App\Api\Notification\AlreadySubscribedError;
use Jazzfreunde\App\Api\Notification\NotificationSubscription as NotificationSubscriptionApi;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Entity\Notification\NotificationSubscription;
use Jazzfreunde\App\Event\Listener\Api\Contract\WriteConfirmationListener;
use Jazzfreunde\App\Repository\Filter\NotificationSubscriptionFilter;
use Jazzfreunde\App\Service\Contract\ConfirmationContractService;
use Jazzfreunde\App\Service\Notification\NotificationSubscriptionRepositoryInterface;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use Jazzfreunde\App\Type\Primitive\Email;
use Jazzfreunde\App\Type\Primitive\Uri;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * @internal
 *
 * @coversNothing
 */
final class WriteConfirmationListenerTest extends TestCase
{
    public function testNewSubscriptionDoesNotRestartConfirmation(): void
    {
        $apiSubscription = $this->newApiSubscription();
        $uut = new UnitUnderTest(WriteConfirmationListener::class);
        $repository = $uut->mock(NotificationSubscriptionRepositoryInterface::class);
        $repository
            ->expects($this->once())
            ->method('findOneByFilter')
            ->with($this->callback(
                static fn (NotificationSubscriptionFilter $filter): bool => '/events/123' === $filter->resourceScope
                && 'test@mail.com' === $filter->email
                && null === $filter->confirmationState
            ))
            ->willReturn(null);

        $confirmationContracts = $uut->mock(ConfirmationContractService::class);
        $confirmationContracts->expects($this->never())->method('restartEmailConfirmation');
        $event = $this->newViewEvent($apiSubscription);

        $uut->target()->validateExistingSubscription($event);

        $this->assertNull($event->getResponse());
    }

    public function testPendingSubscriptionRestartsConfirmation(): void
    {
        $subscription = $this->newEntitySubscription(ConfirmationStateEnum::Pending);
        $uut = new UnitUnderTest(WriteConfirmationListener::class);
        $repository = $uut->mock(NotificationSubscriptionRepositoryInterface::class);
        $repository
            ->expects($this->once())
            ->method('findOneByFilter')
            ->willReturn($subscription);

        $confirmationContracts = $uut->mock(ConfirmationContractService::class);
        $confirmationContracts
            ->expects($this->once())
            ->method('restartEmailConfirmation')
            ->with($subscription->confirmation, $subscription->email);

        $event = $this->newViewEvent($this->newApiSubscription());

        $uut->target()->validateExistingSubscription($event);

        $this->assertSame(200, $event->getResponse()?->getStatusCode());
        $this->assertSame(
            NotificationSubscription::class,
            $subscription->confirmation->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_CLASS]
        );
        $this->assertSame(
            $subscription->uuid,
            $subscription->confirmation->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_UUID]
        );
    }

    public function testConfirmedSubscriptionThrowsAlreadySubscribedError(): void
    {
        $subscription = $this->newEntitySubscription(ConfirmationStateEnum::Confirmed);
        $uut = new UnitUnderTest(WriteConfirmationListener::class);
        $repository = $uut->mock(NotificationSubscriptionRepositoryInterface::class);
        $repository
            ->expects($this->once())
            ->method('findOneByFilter')
            ->willReturn($subscription);

        $confirmationContracts = $uut->mock(ConfirmationContractService::class);
        $confirmationContracts->expects($this->never())->method('restartEmailConfirmation');

        $event = $this->newViewEvent($this->newApiSubscription());

        try {
            $uut->target()->validateExistingSubscription($event);
            $this->fail('Expected already subscribed error.');
        } catch (AlreadySubscribedError $error) {
            $this->assertSame(409, $error->getStatus());
            $this->assertSame('urn:jazzfreunde-ingolstadt-error:already-subscribed', $error->getType());
        }
    }

    public function testWrittenSubscriptionStartsConfirmation(): void
    {
        $subscription = $this->newEntitySubscription(ConfirmationStateEnum::New);
        $uut = new UnitUnderTest(WriteConfirmationListener::class);
        $repository = $uut->mock(NotificationSubscriptionRepositoryInterface::class);
        $repository->expects($this->never())->method('findByFilter');
        $confirmationContracts = $uut->mock(ConfirmationContractService::class);
        $confirmationContracts
            ->expects($this->once())
            ->method('startEmailConfirmation')
            ->with($subscription->confirmation, $subscription->email);

        $event = $this->newViewEvent($subscription);

        $uut->target()->startConfirmationProcess($event);

        $this->assertSame(
            NotificationSubscription::class,
            $subscription->confirmation->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_CLASS]
        );
        $this->assertSame(
            $subscription->uuid,
            $subscription->confirmation->metadata[ConfirmationContract::METADATA_CONFIRMABLE_ENTITY_UUID]
        );
    }

    private function newApiSubscription(): NotificationSubscriptionApi
    {
        return new NotificationSubscriptionApi(
            resourceScope: '/events/123',
            email: 'test@mail.com',
        );
    }

    private function newEntitySubscription(ConfirmationStateEnum $state): NotificationSubscription
    {
        $subscription = new NotificationSubscription();
        $subscription->uuid = '00000000-0000-4000-8000-000000000001';
        $subscription->resourceScope = Uri::from('/events/123');
        $subscription->email = Email::from('test@mail.com');
        $subscription->confirmation = new ConfirmationContract();
        $subscription->confirmation->state = $state;

        return $subscription;
    }

    private function newViewEvent(object $controllerResult): ViewEvent
    {
        return new ViewEvent(
            $this->createStub(HttpKernelInterface::class),
            Request::create('/', Request::METHOD_POST),
            HttpKernelInterface::MAIN_REQUEST,
            $controllerResult,
        );
    }
}
