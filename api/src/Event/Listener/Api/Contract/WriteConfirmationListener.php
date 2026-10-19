<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Event\Listener\Api\Contract;

use ApiPlatform\Symfony\EventListener\EventPriorities;
use Jazzfreunde\App\Api\Notification\AlreadySubscribedError;
use Jazzfreunde\App\Api\Notification\NotificationSubscription;
use Jazzfreunde\App\Entity\Contract\ConfirmableEntity;
use Jazzfreunde\App\Repository\Filter\NotificationSubscriptionFilter;
use Jazzfreunde\App\Service\Contract\ConfirmationContractService;
use Jazzfreunde\App\Service\Notification\NotificationSubscriptionRepositoryInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Starts the confirmation process for entities that implement ConfirmableInterface.
 *
 * @psalm-api
 */
#[AsEventListener(event: KernelEvents::VIEW, method: 'validateExistingSubscription', priority: EventPriorities::POST_VALIDATE)]
#[AsEventListener(event: KernelEvents::VIEW, method: 'startConfirmationProcess', priority: EventPriorities::POST_WRITE)]
final class WriteConfirmationListener
{
    /**
     * @param ConfirmationContractService $confirmationContracts
     *
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function __construct(
        private ConfirmationContractService $confirmationContracts,
        private NotificationSubscriptionRepositoryInterface $notificationSubscriptionRepository
    ) {}

    /**
     * Check if a subscription under this resource scope already exists.
     *
     * @param ViewEvent $event
     */
    public function validateExistingSubscription(ViewEvent $event): void
    {
        $request = $event->getRequest();

        if (Request::METHOD_POST !== $request->getMethod()) {
            return;
        }

        $controllerResult = $event->getControllerResult();

        if (!$controllerResult instanceof NotificationSubscription) {
            return;
        }

        $filter = new NotificationSubscriptionFilter(
            resourceScope: $controllerResult->resourceScope,
            email: $controllerResult->email
        );
        $filter->confirmationState = null;
        $existingSubscription = $this->notificationSubscriptionRepository
            ->findOneByFilter($filter);

        if (null === $existingSubscription) {
            return;
        }

        if ($existingSubscription->confirmation->isConfirmed()) {
            throw new AlreadySubscribedError();
        }

        $existingSubscription->confirmation->setConfirmableEntity($existingSubscription);

        $this->confirmationContracts->restartEmailConfirmation(
            $existingSubscription->confirmation,
            $existingSubscription->email
        );

        $event->setResponse(new JsonResponse([
            'message' => 'The confirmation workflow has been restarted for this subscription.',
        ], JsonResponse::HTTP_OK));
    }

    /**
     * Starts the confirmation process for entities that implement ConfirmableInterface after they have been written to the database.
     *
     * @psalm-api
     */
    public function startConfirmationProcess(ViewEvent $event): void
    {
        $method = $event->getRequest()->getMethod();

        if (Request::METHOD_POST !== $method) {
            return;
        }

        $controllerResult = $event->getControllerResult();

        if (!$controllerResult instanceof ConfirmableEntity) {
            return;
        }

        $confirmationContract = $controllerResult->confirmation;
        $confirmationContract->setConfirmableEntity($controllerResult);
        $email = $controllerResult->email;

        $this->confirmationContracts->startEmailConfirmation(
            $confirmationContract,
            $email
        );
    }
}
