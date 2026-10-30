<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Tests\Service\Health;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectRepository;
use Jazzfreunde\Api\Entity\KnownMail;
use Jazzfreunde\Api\Service\Health\KnownMailHealthCheck;
use Jazzfreunde\Api\Type\Enum\HealthStatusEnum;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\Api\Type\Primitive\Email;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Jazzfreunde\Api\Service\Health\KnownMailHealthCheck
 *
 * @internal
 */
final class KnownMailHealthCheckTest extends TestCase
{
    public function testReturnsHealthyWhenAllHandlesAreConfigured(): void
    {
        $uut = new UnitUnderTest(KnownMailHealthCheck::class);
        $repository = $uut->mock(ObjectRepository::class);
        $repository->expects($this->once())
            ->method('findAll')
            ->willReturn([
                new KnownMail(handle: KnownMailHandleEnum::NoReply, address: new Email('no-reply@example.com')),
                new KnownMail(handle: KnownMailHandleEnum::Jazzletter, address: new Email('jazzletter@example.com')),
                new KnownMail(handle: KnownMailHandleEnum::Developers, address: new Email('developers@example.com')),
            ]);

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getRepository')
            ->with(KnownMail::class)
            ->willReturn($repository);

        $this->assertSame(HealthStatusEnum::Healthy, $uut->target()->checkHealth());
    }

    public function testReturnsDegradedWhenAHandleIsNotConfigured(): void
    {
        $uut = new UnitUnderTest(KnownMailHealthCheck::class);
        $repository = $uut->mock(ObjectRepository::class);
        $repository->expects($this->once())
            ->method('findAll')
            ->willReturn([
                new KnownMail(handle: KnownMailHandleEnum::NoReply, address: new Email('no-reply@example.com')),
                new KnownMail(handle: KnownMailHandleEnum::Jazzletter, address: new Email('jazzletter@example.com')),
            ]);

        $uut->mock(ManagerRegistry::class)
            ->expects($this->once())
            ->method('getRepository')
            ->with(KnownMail::class)
            ->willReturn($repository);

        $this->assertSame(HealthStatusEnum::Degraded, $uut->target()->checkHealth());
    }
}
