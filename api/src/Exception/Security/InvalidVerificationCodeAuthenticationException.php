<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Exception\Security;

use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * Exception thrown when an invalid request made to the verification code authenticator.
 */
final class InvalidVerificationCodeAuthenticationException extends AuthenticationException {}
