<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Entity\Contract;

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
        $contract->openForConfirmationUntil = new \DateTimeImmutable('yesterday');
        $this->assertTrue($contract->hasConfirmationPeriodExpired());
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
     * Test confirming a contract
     *
     * @return void
     */
    public function testConfirm(): void
    {
        $contract = new ConfirmationContract();
        $contract->confirm();
        $this->assertTrue($contract->isConfirmed());
        $this->assertEquals(ConfirmationStateEnum::Confirmed, $contract->state);
    }

    /**
     * Test canceling a contract
     *
     * @return void
     */
    public function testCancel(): void
    {
        $contract = new ConfirmationContract();
        $contract->cancel();
        $this->assertFalse($contract->isConfirmed());
        $this->assertEquals(ConfirmationStateEnum::Cancelled, $contract->state);
    }
}
