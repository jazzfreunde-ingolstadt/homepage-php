<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Validation\Attribute;

use Attribute;
use Jazzfreunde\App\Validation\Validator\EmailDomainDnsValidator;
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
