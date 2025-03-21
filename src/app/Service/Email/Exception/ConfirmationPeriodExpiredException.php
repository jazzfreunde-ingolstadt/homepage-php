<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email\Exception;

use Jazzfreunde\App\Entity\Contract\ConfirmationContract;

/**
 * The requested confirmation has expired
 */
final class ConfirmationPeriodExpiredException extends \Exception
{
    /**
     * The requested confirmation has expired
     *
     * @param ConfirmationContract $request requested confirmation
     */
    public function __construct(ConfirmationContract $request)
    {
        $this->message = "Confirmation with token '{$request->token}' has expired at {$request->openForConfirmationUntil->format('Y-m-d H:i:s')}.";
    }
}
