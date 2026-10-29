<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Controller\Contract;

use Jazzfreunde\App\Api\Contract\ConfirmationContractNotFoundError as ConfirmationContractNotFoundApiError;
use Jazzfreunde\App\Exception\Contract\ConfirmationContractNotFoundException;
use Jazzfreunde\App\Service\Contract\ConfirmationContractService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;

/**
 * Controller responsible for canceling contracts.
 *
 * @psalm-api
 */
#[AsController]
final class CancelContractController extends AbstractController
{
    /**
     * @param ConfirmationContractService $confirmationContracts
     */
    public function __construct(
        private ConfirmationContractService $confirmationContracts,
    ) {}

    /**
     * Cancels a contract using the provided token.
     *
     * @param string $token
     *
     * @return Response
     */
    public function __invoke(string $token): Response
    {
        try {
            $this->confirmationContracts->cancelContract($token);

            return new Response(status: Response::HTTP_ACCEPTED);
        } catch (ConfirmationContractNotFoundException) {
            throw new ConfirmationContractNotFoundApiError();
        }
    }
}
