<?php

use \Jazzfreunde\App\Models;
use \Jazzfreunde\App\DTOs\Termin;
use Jazzfreunde\Database;

$event_item = function (Termin $event) {

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

final class TermineFilter extends Database\Filter
{
    use Database\Pagination;
}

$event_calender = function () use ($event_item) {
    try {
        // $termine = new Models\TermineModel($this->DatabaseContext());
        // $events = $termine->fetch(
        //     new Models\TermineFilter()
        // );
        $events = [];

    } catch (Exception $e) {
        $events = [];
    }

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
            foreach ($events as $event) {
                $event_item($event);
            }
            ?>
        </tbody>
    </table>
    <?php
};

return $event_calender;
