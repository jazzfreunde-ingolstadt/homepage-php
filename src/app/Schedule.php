<?php declare(strict_types = 1);

namespace Jazzfreunde\App;

use Override;
use Symfony\Component\Scheduler\Attribute\AsSchedule;
use Symfony\Component\Scheduler\Schedule as SymfonySchedule;
use Symfony\Component\Scheduler\ScheduleProviderInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * Schedule class for managing scheduled tasks.
 *
 * @psalm-api
 */
#[AsSchedule]
final class Schedule implements ScheduleProviderInterface
{
    /**
     * @param CacheInterface $cache
     */
    public function __construct(
        private CacheInterface $cache,
    ) {
    }

    /**
     * Returns the schedule for the application.
     *
     * @return SymfonySchedule
     */
    #[Override]
    public function getSchedule(): SymfonySchedule
    {
        return (new SymfonySchedule())
            ->stateful($this->cache) // ensure missed tasks are executed
            ->processOnlyLastMissedRun(true) // ensure only last missed task is run

            // add your own tasks here
            // see https://symfony.com/doc/current/scheduler.html#attaching-recurring-messages-to-a-schedule
        ;
    }
}
