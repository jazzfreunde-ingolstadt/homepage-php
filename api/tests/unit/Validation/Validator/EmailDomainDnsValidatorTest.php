<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Validation\Validator;

use Jazzfreunde\App\Service\Email\DnsRecordLookupInterface;
use Jazzfreunde\App\Validation\Attribute\EmailDomainDns;
use Jazzfreunde\App\Validation\Validator\EmailDomainDnsValidator;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\NullLogger;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

/**
 * Tests for the EmailDomainDnsValidator class.
 *
 * @internal
 *
 * @coversNothing
 */
final class EmailDomainDnsValidatorTest extends ConstraintValidatorTestCase
{
    private DnsRecordLookupInterface|MockObject $dnsRecordLookup;

    #[Test]
    public function isValidWhenDomainHasMxRecords(): void
    {
        $this->dnsRecordLookup->expects($this->once())
            ->method('lookup')
            ->with('example.test', DNS_MX)
            ->willReturn([['target' => 'mail.example.test', 'pri' => 10]]);

        $this->validator->validate('subscriber@example.test', new EmailDomainDns());

        $this->assertNoViolation();
    }

    #[Test]
    public function isValidWhenDomainHasAddressRecordsWithoutMx(): void
    {
        $this->dnsRecordLookup->expects($this->exactly(2))
            ->method('lookup')
            ->willReturnOnConsecutiveCalls([], [['ip' => '192.0.2.1']]);

        $this->validator->validate('subscriber@example.test', new EmailDomainDns());

        $this->assertNoViolation();
    }

    #[Test]
    public function isValidWhenDomainHasIpv6AddressRecordsWithoutMx(): void
    {
        $this->dnsRecordLookup->expects($this->exactly(3))
            ->method('lookup')
            ->willReturnOnConsecutiveCalls([], [], [['ipv6' => '2001:db8::1']]);

        $this->validator->validate('subscriber@example.test', new EmailDomainDns());

        $this->assertNoViolation();
    }

    #[Test]
    public function isInvalidWhenDomainHasNoMailRecords(): void
    {
        $this->dnsRecordLookup->expects($this->exactly(3))
            ->method('lookup')
            ->willReturnOnConsecutiveCalls([], [], []);

        $constraint = new EmailDomainDns();
        $this->validator->validate('subscriber@example.test', $constraint);

        $this->buildViolation($constraint->message)
            ->setParameter('{{ domain }}', 'example.test')
            ->assertRaised();
    }

    #[Test]
    public function doesNotRejectWhenDnsLookupFails(): void
    {
        $this->dnsRecordLookup->expects($this->exactly(3))
            ->method('lookup')
            ->willReturnOnConsecutiveCalls(false, false, false);

        $this->validator->validate('subscriber@example.test', new EmailDomainDns());

        $this->assertNoViolation();
    }

    #[Test]
    public function rejectsNullMxRecord(): void
    {
        $this->dnsRecordLookup->expects($this->once())
            ->method('lookup')
            ->with('example.test', DNS_MX)
            ->willReturn([['target' => '.', 'pri' => 0]]);

        $constraint = new EmailDomainDns();
        $this->validator->validate('subscriber@example.test', $constraint);

        $this->buildViolation($constraint->message)
            ->setParameter('{{ domain }}', 'example.test')
            ->assertRaised();
    }

    #[Test]
    public function skipsDnsForMalformedEmailAddress(): void
    {
        $this->dnsRecordLookup->expects($this->never())
            ->method('lookup');

        $this->validator->validate('not-an-email', new EmailDomainDns());

        $this->assertNoViolation();
    }

    /**
     * {@inheritDoc}
     */
    protected function createValidator(): EmailDomainDnsValidator
    {
        $this->dnsRecordLookup = $this->createMock(DnsRecordLookupInterface::class);

        return new EmailDomainDnsValidator($this->dnsRecordLookup, new NullLogger());
    }
}
