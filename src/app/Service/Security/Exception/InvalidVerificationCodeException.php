<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Service\Security\Exception;

use RuntimeException;

/**
 * Exception thrown when an invalid verification code request is encountered.
 */
final class InvalidVerificationCodeException extends RuntimeException
{
}
