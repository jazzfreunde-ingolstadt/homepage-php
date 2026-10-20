<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Event\Listener\Api\Contract;

use DateTimeImmutable;
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
use LogicException;
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
        $expirationTime = new DateTimeImmutable('+3 days');
        $apiSubscription = $this->newApiSubscription($expirationTime);
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
            ->with(
                $this->callback(function (ConfirmationContract $contract) use ($subscription, $expirationTime): bool {
                    $this->assertSame($subscription->confirmation, $contract);
                    $this->assertEquals(
                        NotificationSubscriptionApi::normalizeExpirationTime($expirationTime),
                        $contract->expirationTime
                    );

                    return true;
                }),
                $subscription->email,
            );

        $event = $this->newViewEvent($apiSubscription);

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
        $uut->mock(NotificationSubscriptionRepositoryInterface::class)
            ->expects($this->never())
            ->method('findOneByFilter');
        $confirmationContracts = $uut->mock(ConfirmationContractService::class);
        $confirmationContracts
            ->expects($this->once())
            ->method('startEmailConfirmation')
            ->with($subscription->confirmation, $subscription->email);

        $event = $this->newViewEvent($this->newApiSubscription(), $subscription);

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

    public function testWrittenSubscriptionFailsIfPersistedDataIsMissing(): void
    {
        $uut = new UnitUnderTest(WriteConfirmationListener::class);
        $uut->mock(NotificationSubscriptionRepositoryInterface::class)
            ->expects($this->never())
            ->method('findOneByFilter');
        $uut->mock(ConfirmationContractService::class)
            ->expects($this->never())
            ->method('startEmailConfirmation');

        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('The output mapper did not provide the persisted notification subscription.');

        $uut->target()->startConfirmationProcess($this->newViewEvent($this->newApiSubscription()));
    }

    private function newApiSubscription(?DateTimeImmutable $expirationTime = null): NotificationSubscriptionApi
    {
        return new NotificationSubscriptionApi(
            resourceScope: '/events/123',
            email: 'test@mail.com',
            expirationTime: $expirationTime,
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

    private function newViewEvent(object $controllerResult, ?NotificationSubscription $persistedData = null): ViewEvent
    {
        $request = Request::create('/', Request::METHOD_POST);
        if (null !== $persistedData) {
            $request->attributes->set('persisted_data', $persistedData);
        }

        return new ViewEvent(
            $this->createStub(HttpKernelInterface::class),
            $request,
            HttpKernelInterface::MAIN_REQUEST,
            $controllerResult,
        );
    }
}
