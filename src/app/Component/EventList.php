<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component;

use Components\Component;
use Components\Traits\Props;
use Jazzfreunde\App\Entity\Event;

/**
 * Eventliste
 */
final class EventList extends Component
{
    use Props;

    /**
     * {@inheritdoc}
     */
    public function render(): void
    {
        ?>
        <h2>Kommende Veranstaltungen</h2>
        <table class="termine" cellspacing="0" cellpadding="3" border="0" width="90%" align="center">
            <thead>
                <tr>
                    <th width="20%">Datum</th>
                    <th width="15%">Zeit</th>
                    <th width="40%">Veranstaltung</th>
                    <th width="25%">Ort</th>
                </tr>
            </thead>
            <tbody>
                <?php $this->generateEventList($this->props->events); ?>
            </tbody>
        </table>
        <?php
    }

    /**
     * Generiert die Liste der Veranstaltungen
     *
     * @param array $events
     *
     * @return void
     */
    private function generateEventList(array $events): void
    {
        $eventItem = function (Event $event): void {
            ?>
            <tr>
                <td>
                    <small class="wochentag"><?= $event->start->Format('l') ?></small><br />
                    <?= $event->start->Format('d.m.Y') ?>
                </td>
                <td>
                    <?= $event->start->Format('H:i') ?>
                </td>
                <th>
                    <?= $event->titel ?>
                    <?php if ($event->subtitel) { ?>
                        </br><small><?= $event->subtitel ?></small>
                    <?php } ?>
                </th>
                <td>
                    <?= $event->ort ?>
                </td>
            </tr>
            <?php
        };

        array_walk($events, $eventItem);
    }
}
