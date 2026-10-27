<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Controller;

use Endroid\QrCode\Builder\BuilderInterface;
use Endroid\QrCode\Builder\BuilderRegistryInterface;
use Endroid\QrCode\Writer\Result\ResultInterface;
use Jazzfreunde\App\Controller\LandingPageController;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;

/**
 * @covers \Jazzfreunde\App\Controller\LandingPageController
 *
 * @internal
 */
final class LandingPageControllerTest extends TestCase
{
    public function testQrCodeReturnsPngForLandingPageUrl(): void
    {
        $this->assertQrCodeResponse(
            'https://example.org/landing/qr/summer-jazz',
            'default',
        );
    }

    public function testQrCodeUsesDesignFromQueryParameter(): void
    {
        $this->assertQrCodeResponse(
            'https://example.org/landing/qr/summer-jazz?design=small_yellow',
            'small_yellow',
        );
    }

    private function assertQrCodeResponse(string $requestUrl, string $expectedDesign): void
    {
        $result = $this->createMock(ResultInterface::class);
        $result->expects($this->once())
            ->method('getString')
            ->willReturn('png-content');
        $result->expects($this->once())
            ->method('getMimeType')
            ->willReturn('image/png');

        $builder = $this->createMock(BuilderInterface::class);
        $builder->expects($this->once())
            ->method('build')
            ->willReturnCallback(function (mixed ...$arguments) use ($result): ResultInterface {
                $this->assertSame(
                    'https://example.org/landing/summer-jazz',
                    $arguments[3],
                );

                return $result;
            });

        $builderRegistry = $this->createMock(BuilderRegistryInterface::class);
        $builderRegistry->expects($this->once())
            ->method('get')
            ->with($expectedDesign)
            ->willReturn($builder);

        $uut = new UnitUnderTest(LandingPageController::class);
        $response = $uut->target()->qrCode(
            'summer-jazz',
            Request::create($requestUrl),
            $builderRegistry,
        );

        $this->assertSame('image/png', $response->headers->get('Content-Type'));
        $this->assertSame('png-content', $response->getContent());
    }
}
