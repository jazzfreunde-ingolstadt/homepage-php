<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Validation\Attribute;

use Attribute;
use Jazzfreunde\Api\Validation\Validator\EmailDomainDnsValidator;
use Override;
use Symfony\Component\Validator\Constraint;

/**
 * Validates that an email domain has mail-capable DNS records.
 *
 * @psalm-api
 */
#[Attribute]
final class EmailDomainDns extends Constraint
{
    public string $message = 'The email domain "{{ domain }}" does not appear to accept email.';

    /**
     * Returns the name of the validator class.
     *
     * @return string
     */
    #[Override]
    public function validatedBy(): string
    {
        return EmailDomainDnsValidator::class;
    }
}
