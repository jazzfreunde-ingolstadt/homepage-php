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
        $eventList = function (array $events, string $messageOnEmpty) {
            if (empty($events)) {
                ?>
                <p><?= $messageOnEmpty ?></p>
                <?php
            }
            ?>
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
                <?php $this->generateEventListItems($events); ?>
            </tbody>
        </table>
            <?php
        };

        ?>
        <h2>Kommende Veranstaltungen</h2>
        <?php $eventList($this->props->futureEvents, 'Im Moment stehen keine Veranstaltungen an.'); ?>

        <p>Auch interessant: Das Programm unserer Partner des <a href="https://www.birdland.de/programm/" target="_blank">Birdland Jazz Club Neuburg</a>!</p>

        <h2>Vergangene Veranstaltungen</h2>
        <?php $eventList($this->props->pastEvents, 'Es sind keine vergangenen Veranstaltungen eingetragen.'); ?>

        <h2>Veranstaltungsarchiv</h2>
        <div id="vaarcsw" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;" onclick="document.getElementById('vaarc').style.display = 'block'; document.getElementById('vaarcsw').style.display='none';">Archiv anzeigen</div>
        <div id="vaarc" style="display:none;">
            <?php $eventList($this->props->archivedEvents, 'Es befinden sich keine Veranstaltungen im Archiv.'); ?>
            <div id="vaarcsw" style="display:block; cursor:pointer; font-size:0.95em; text-decoration:underline;" onclick="document.getElementById('vaarc').style.display = 'none'; document.getElementById('vaarcsw').style.display='block';">Archiv verbergen</div>
        </div>
        <?php
    }

    /**
     * Generiert die Liste der Veranstaltungen
     *
     * @param array $events
     *
     * @return void
     */
    private function generateEventListItems(array $events): void
    {
        if ($this->props->edit) {
            echo 'Im in editing mode!';
        }
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
