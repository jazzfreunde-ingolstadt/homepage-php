<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email\Exception;

/**
 * The requested confirmation contract does not exist
 */
final class ConfirmationContractNotFoundException extends \Exception
{
    /**
     * The requested confirmation contract does not exist
     *
     * @param string $token Token for the requested confirmation
     */
    public function __construct(string $token)
    {
        $this->message = "Confirmation contract with token '{$token}' could not be found.";
    }
}
