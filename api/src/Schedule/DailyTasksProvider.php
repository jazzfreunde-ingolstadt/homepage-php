<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Schedule;

use DateInterval;
use Jazzfreunde\App\Message\Messages\Tasks\PurgeVacantConfirmationContractsMessage;
use Jazzfreunde\App\Message\Messages\Tasks\SendEventNotificationsMessage;
use Jazzfreunde\App\Message\Messages\Tasks\SendMonitoringReportMessage;
use Override;
use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\RecurringMessage;
use Symfony\Component\Scheduler\Schedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * Schedule class for managing daily tasks.
 *
 * @psalm-api
 */
#[AsSchedule('daily')]
final class DailyTasksProvider implements ScheduleProviderInterface
{
    /**
     * @param CacheInterface $cache
     */
    public function __construct(
        private CacheInterface $cache,
    ) {}

    /**
     * {@inheritDoc}
     */
    #[Override]
    public function getSchedule(): Schedule
    {
        return (new Schedule())
            ->with(
                RecurringMessage::cron('0 0 * * *', new PurgeVacantConfirmationContractsMessage()),
                RecurringMessage::cron('0 10 * * *', new SendEventNotificationsMessage(upcomingIn: new DateInterval('P5D'))),
                RecurringMessage::cron('0 0 * * *', new SendMonitoringReportMessage())
            )
            ->stateful($this->cache)
            ->processOnlyLastMissedRun(true);
    }
}
