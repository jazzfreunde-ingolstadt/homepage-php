<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Service\Email\Exception;

/**
 * The requested confirmation does not exist
 */
class ConfirmationNotFoundException extends \Exception
{
    /**
     * The requested confirmation does not exist
     *
     * @param string $token Token for the requested confirmation
     */
    public function __construct(string $token)
    {
        $this->message = "Confirmation with token '{$token}' could not be found.";
    }
}
