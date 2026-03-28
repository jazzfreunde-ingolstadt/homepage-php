<?php declare(strict_types = 1);

namespace JazzfreundeTests\App\Tests\Message\Handler\Tasks;

use Jazzfreunde\App\Message\Handler\Tasks\ConfirmationContractPurgeHandler;
use Jazzfreunde\App\Service\Contract\ConfirmationContractPurgingService;
use Jazzfreunde\UnitTest\Trait\MockingTrait;
use PHPUnit\Framework\TestCase;

/**
 * Tests for the confirmation contract purge message handler.
 */
final class ConfirmationContractPurgeHandlerTest extends TestCase
{
    use MockingTrait;

    /**
     * Test dispatching the purge command to the repository.
     */
    public function testHandlePurgeVacantConfirmationContracts(): void
    {
        $repository = $this->mock(ConfirmationContractPurgingService::class);
        $repository
            ->expects($this->once())
            ->method('purgeVacantContracts');

        $handler = new ConfirmationContractPurgeHandler($repository);
        $handler->handlePurgeVacantConfirmationContracts();
    }
}
