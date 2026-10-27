<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Validation\Validator;

use Jazzfreunde\App\Service\Email\DnsRecordLookupInterface;
use Jazzfreunde\App\Validation\Attribute\EmailDomainDns;
use Override;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Validates that an email domain can receive mail according to DNS.
 *
 * @psalm-api
 */
#[AutoconfigureTag('validator.constraint_validator')]
final class EmailDomainDnsValidator extends ConstraintValidator
{
    public function __construct(
        private readonly DnsRecordLookupInterface $dnsRecordLookup,
        private readonly LoggerInterface $logger,
    ) {}

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof EmailDomainDns) {
            throw new UnexpectedTypeException($constraint, EmailDomainDns::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return;
        }

        $at = strrpos($value, '@');
        if (false === $at) {
            return;
        }

        $domain = strtolower(rtrim(substr($value, $at + 1), '.'));
        $lookupFailed = false;

        if ($this->validateMxRecords($domain, $constraint, $lookupFailed)) {
            return;
        }

        if ($this->hasAddressRecords($domain, $lookupFailed)) {
            return;
        }

        if ($lookupFailed) {
            $this->logger->debug(
                'Could not verify email domain DNS records; allowing the address.',
                ['domain' => $domain],
            );

            return;
        }

        $this->addViolation($constraint, $domain);
    }

    private function validateMxRecords(
        string $domain,
        EmailDomainDns $constraint,
        bool &$lookupFailed,
    ): bool {
        $mxRecords = $this->dnsRecordLookup->lookup($domain, DNS_MX);
        if (false === $mxRecords) {
            $lookupFailed = true;

            return false;
        }

        if ([] === $mxRecords) {
            return false;
        }

        foreach ($mxRecords as $mxRecord) {
            /** @var mixed $target */
            $target = $mxRecord['target'] ?? null;
            if (is_string($target) && '' !== $target && '.' !== $target) {
                return true;
            }
        }

        $this->addViolation($constraint, $domain);

        return true;
    }

    private function hasAddressRecords(string $domain, bool &$lookupFailed): bool
    {
        foreach ([DNS_A, DNS_AAAA] as $type) {
            $records = $this->dnsRecordLookup->lookup($domain, $type);
            if (false === $records) {
                $lookupFailed = true;

                continue;
            }

            if ([] !== $records) {
                return true;
            }
        }

        return false;
    }

    private function addViolation(EmailDomainDns $constraint, string $domain): void
    {
        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ domain }}', $domain)
            ->addViolation();
    }
}
