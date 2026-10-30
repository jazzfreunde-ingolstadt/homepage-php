<?php

declare(strict_types=1);

namespace JazzfreundeTests\Api\Tests\Message\Handler\Tasks;

use Jazzfreunde\Api\Message\Handler\Tasks\MonitoringReportHandler;
use Jazzfreunde\Api\Message\Messages\Email\EmailNotification;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Jazzfreunde\UnitTest\UnitUnderTest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * @internal
 *
 * @coversNothing
 */
final class MonitoringReportHandlerTest extends TestCase
{
    /**
     * Verifies the notification is sent to the developers.
     */
    public function testSendsMonitoringReportEmailToDevelopers(): void
    {
        $uut = new UnitUnderTest(MonitoringReportHandler::class);

        $uut->mock(MessageBusInterface::class)
            ->expects($this->once())
            ->method('dispatch')
            ->with($this->callback(function (EmailNotification $email): bool {
                $this->assertSame(KnownMailHandleEnum::NoReply, $email->sender);
                $this->assertSame(KnownMailHandleEnum::Developers, $email->recipient);
                $this->assertSame('Täglicher Monitoring-Bericht', $email->subject);
                $this->assertSame(EmailTemplatePath::MONITORING_DAILY_REPORT, $email->twigTemplate);

                return true;
            }))
            ->willReturnCallback(static fn (object $message): Envelope => new Envelope($message));

        $uut->target()->handleSendMonitoringReport();
    }
}
