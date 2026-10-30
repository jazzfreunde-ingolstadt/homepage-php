<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Controller\Contract;

use Jazzfreunde\Api\Exception\Contract\ConfirmationContractNotFoundException;
use Jazzfreunde\Api\Exception\Contract\ConfirmationPeriodExpiredException;
use Jazzfreunde\Api\Platform\Contract\ConfirmationContractNotFoundError as ConfirmationContractNotFoundApiError;
use Jazzfreunde\Api\Platform\Contract\ConfirmationPeriodExpiredError as ConfirmationPeriodExpiredApiError;
use Jazzfreunde\Api\Service\Contract\ConfirmationContractService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;

/**
 * Controller responsible for confirming contracts.
 *
 * @psalm-api
 */
#[AsController]
final class ConfirmContractController extends AbstractController
{
    /**
     * @param ConfirmationContractService $confirmationContracts
     */
    public function __construct(
        private ConfirmationContractService $confirmationContracts,
    ) {}

    /**
     * Confirms a contract using the provided token.
     *
     * @param string $token
     *
     * @return Response
     */
    public function __invoke(string $token): Response
    {
        try {
            $this->confirmationContracts->confirmContract($token);

            return new Response(status: Response::HTTP_ACCEPTED);
        } catch (ConfirmationPeriodExpiredException) {
            throw new ConfirmationPeriodExpiredApiError();
        } catch (ConfirmationContractNotFoundException) {
            throw new ConfirmationContractNotFoundApiError();
        }
    }
}
