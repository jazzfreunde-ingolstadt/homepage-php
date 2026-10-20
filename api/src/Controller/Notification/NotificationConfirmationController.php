<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Controller\Notification;

use Jazzfreunde\App\Exception\Contract\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Exception\Contract\ConfirmationPeriodExpiredException;
use Jazzfreunde\App\Service\Contract\ConfirmationContractService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Handles notification confirmation links from email.
 *
 * @psalm-api
 */
final class NotificationConfirmationController extends AbstractController
{
    public function __construct(
        private readonly ConfirmationContractService $confirmationContracts,
    ) {}

    /**
     * Confirms the notification subscription associated with the token.
     */
    #[Route('/notifications/confirm/{token}', name: 'notification_confirm', methods: ['GET'])]
    public function __invoke(string $token): Response
    {
        try {
            $this->confirmationContracts->confirmContract($token);
        } catch (ConfirmationPeriodExpiredException) {
            return new Response(status: Response::HTTP_GONE);
        } catch (ConfirmationContractNotFoundException) {
            return new Response(status: Response::HTTP_NOT_FOUND);
        }

        return $this->render('@pages/notifications/confirmation-notification.html.twig');
    }
}
