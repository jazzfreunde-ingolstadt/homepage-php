<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Validation\Attribute;

use Attribute;
use Jazzfreunde\Api\Validation\Validator\NotificationScopeValidator;
use Override;
use Symfony\Component\Validator\Constraint;

/**
 * Attribute to validate a notification scope.
 *
 * The notification scope must point to an existing notification resource.
 *
 * @psalm-api
 */
#[Attribute]
final class NotificationScope extends Constraint
{
    public string $message = 'The string "{{ string }}" is not a valid notification resource.';

    /**
     * @param null|string                $message
     * @param null|array<string, string> $groups
     * @param null|mixed                 $payload
     */
    public function __construct(?string $message = null, ?array $groups = null, mixed $payload = null)
    {
        parent::__construct(null, $groups, $payload);

        $this->message = $message ?? $this->message;
    }

    /**
     * Returns the name of the validator class.
     *
     * @return string
     */
    #[Override]
    public function validatedBy(): string
    {
        return NotificationScopeValidator::class;
    }
}
