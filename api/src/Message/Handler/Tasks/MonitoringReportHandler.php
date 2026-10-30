<?php

declare(strict_types=1);

namespace Jazzfreunde\Api\Message\Handler\Tasks;

use Jazzfreunde\Api\Message\Messages\Email\EmailNotification;
use Jazzfreunde\Api\Message\Messages\Tasks\SendMonitoringReportMessage;
use Jazzfreunde\Api\Service\Twig\EmailTemplatePath;
use Jazzfreunde\Api\Type\Enum\KnownMailHandleEnum;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Sends the daily monitoring report notification to the developers.
 *
 * @psalm-api
 */
#[AsMessageHandler(
    handles: SendMonitoringReportMessage::class,
    method: 'handleSendMonitoringReport',
)]
final class MonitoringReportHandler
{
    /**
     * @param MessageBusInterface $bus
     */
    public function __construct(
        private readonly MessageBusInterface $bus,
        #[Autowire(env: 'APP_ENV')]
        private readonly string $environmentName,
    ) {}

    /**
     * Dispatches the monitoring report email.
     */
    public function handleSendMonitoringReport(): void
    {
        $this->bus->dispatch(new EmailNotification(
            sender: KnownMailHandleEnum::NoReply,
            recipient: KnownMailHandleEnum::Developers,
            subject: 'Täglicher Monitoring-Bericht',
            twigTemplate: EmailTemplatePath::MONITORING_DAILY_REPORT,
            twigContext: ['environmentName' => $this->environmentName],
        ));
    }
}
