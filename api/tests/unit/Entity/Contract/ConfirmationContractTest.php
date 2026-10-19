<?php

declare(strict_types=1);

namespace JazzfreundeTests\App\Tests\Entity\Contract;

use DateInterval;
use DateTimeImmutable;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * Test for email confirmation service.
 *
 * @internal
 *
 * @coversNothing
 */
final class ConfirmationContractTest extends TestCase
{
    /**
     * Test if the confirmation period has expired.
     */
    public function testHasConfirmationPeriodExpired(): void
    {
        $contract = new ConfirmationContract();
        $contract->requestTime = new DateTimeImmutable('-1 day');
        $tokenLifeTime = DateInterval::createFromDateString('1 hour');

        $this->assertTrue($contract->isExpired($tokenLifeTime));
    }

    public function testExpirationTimeCannotPrecedeRequestTime(): void
    {
        $contract = new ConfirmationContract();
        $contract->requestTime = new DateTimeImmutable('2026-10-18T12:00:00+00:00');
        $contract->expirationTime = $contract->requestTime->modify('-1 second');

        $validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();

        $this->assertCount(1, $validator->validateProperty($contract, 'expirationTime'));
    }

    /**
     * Test if a contract is confirmed.
     */
    public function testIsConfirmed(): void
    {
        $contract = new ConfirmationContract();
        $contract->state = ConfirmationStateEnum::Confirmed;
        $this->assertTrue($contract->isConfirmed());
    }

    /**
     * Test changing state of a contract.
     */
    public function testSetState(): void
    {
        $contract = new ConfirmationContract();
        $contract->setState('confirmed', []);
        $this->assertTrue($contract->isConfirmed());
        $this->assertEquals(ConfirmationStateEnum::Confirmed, $contract->state);
    }
}
