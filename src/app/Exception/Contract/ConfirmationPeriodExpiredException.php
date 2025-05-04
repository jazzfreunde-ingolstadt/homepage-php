<?php declare(strict_types=1);

namespace Jazzfreunde\App\Exception\Contract;

use Exception;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;

/**
 * The requested confirmation has expired
 */
final class ConfirmationPeriodExpiredException extends Exception
{
    /**
     * The requested confirmation has expired
     *
     * @param ConfirmationContract $request requested confirmation
     */
    public function __construct(ConfirmationContract $request)
    {
        $this->message = "Confirmation contract with token '{$request->token}' has expired.";
    }
}
