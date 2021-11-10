<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Components;

use DateTime;
use Components\Component;
use Components\Traits\PropsWithChildren;
use Jazzfreunde\App\Entity\Event;

final class EventList extends Component
{
    use PropsWithChildren;

    public function Render(): void
    {
        $event_item = function (Event $event) {

            $start = new DateTime($event->start)
            ?>
            <tr>
                <td>
                    <small class="wochentag"><?= $start->Format('l') ?></small><br />
                    <?= $start->Format('d.m.Y') ?>
                </td>
                <td>
                    <?= $start->Format('H:i') ?>
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
                <?php

                ?>
            </tbody>
        </table>
        <?php
    }
}