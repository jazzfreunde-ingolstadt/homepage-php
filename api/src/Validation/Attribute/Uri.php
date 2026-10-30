<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Validation\Attribute;

use Attribute;
use Jazzfreunde\Api\Validation\Validator\UriValidator;
use Override;
use Symfony\Component\Validator\Constraint;

/**
 * Attribute to validate a URI path to a resource.
 *
 * The URI must be relative and start with a leading slash.
 *
 * @psalm-api
 */
#[Attribute]
final class Uri extends Constraint
{
    public string $message = 'The string "{{ string }}" is not a valid relative URI path with a leading slash.';

    /**
     * @param null|string                $message
     * @param null|array<string, string> $groups
     * @param null|mixed                 $payload
     */
    public function __construct(?string $message = null, ?array $groups = null, $payload = null)
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
        return UriValidator::class;
    }
}
