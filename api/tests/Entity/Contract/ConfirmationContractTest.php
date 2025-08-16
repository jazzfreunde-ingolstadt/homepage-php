<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Entity\Contract;

use DateInterval;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Jazzfreunde\App\Entity\Contract\ConfirmationContract;
use Jazzfreunde\App\Type\Enum\Contract\ConfirmationStateEnum;

/**
 * Test for email confirmation service
 */
final class ConfirmationContractTest extends TestCase
{
    /**
     * Test if the confirmation period has expired
     *
     * @return void
     */
    public function testHasConfirmationPeriodExpired(): void
    {
        $contract = new ConfirmationContract();
        $contract->requestTime = new DateTimeImmutable('-1 day');
        $tokenLifeTime = DateInterval::createFromDateString('1 hour');

        $this->assertTrue($contract->isExpired($tokenLifeTime));
    }

    /**
     * Test if a contract is confirmed
     *
     * @return void
     */
    public function testIsConfirmed(): void
    {
        $contract = new ConfirmationContract();
        $contract->state = ConfirmationStateEnum::Confirmed;
        $this->assertTrue($contract->isConfirmed());
    }

    /**
     * Test changing state of a contract
     *
     * @return void
     */
    public function testSetState(): void
    {
        $contract = new ConfirmationContract();
        $contract->setState('confirmed', []);
        $this->assertTrue($contract->isConfirmed());
        $this->assertEquals(ConfirmationStateEnum::Confirmed, $contract->state);
    }
}
