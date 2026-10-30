<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Platform\Contract;

use ApiPlatform\Metadata as API;
use ApiPlatform\OpenApi\Model\Operation as OpenApiOperation;
use ApiPlatform\OpenApi\Model\Response as OpenApiResponse;
use Jazzfreunde\Api\Controller\Contract\CancelContractController;
use Jazzfreunde\Api\Controller\Contract\ConfirmContractController;

/**
 * API resource for confirming and cancelling contracts.
 *
 * @psalm-api
 */
#[API\ApiResource(
    shortName: 'Contracts',
    routePrefix: '/contracts',
    operations: [
        new API\Post(
            uriTemplate: '/confirm/{token}',
            name: 'confirm',
            controller: ConfirmContractController::class,
            status: 202,
            input: false,
            output: false,
            openapi: new OpenApiOperation(
                responses: [
                    '202' => new OpenApiResponse(description: 'Confirmation accepted.'),
                ],
            ),
            errors: [
                ConfirmationPeriodExpiredError::class,
                ConfirmationContractNotFoundError::class,
            ],
        ),
        new API\Delete(
            uriTemplate: '/cancel/{token}',
            name: 'cancel',
            controller: CancelContractController::class,
            status: 202,
            read: false,
            output: false,
            openapi: new OpenApiOperation(
                responses: [
                    '202' => new OpenApiResponse(description: 'Cancellation accepted.'),
                ],
            ),
            errors: [
                ConfirmationPeriodExpiredError::class,
                ConfirmationContractNotFoundError::class,
            ],
        ),
    ]
)]
final class ConfirmationContract {}
