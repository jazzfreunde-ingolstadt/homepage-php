<?php

declare(strict_types=1);

use Jazzfreunde\App\Entity\Event;

function setVA(mixed $wannd, mixed $wannt, mixed $was, mixed $wo, mixed $imgid = null, mixed $videolink = null, mixed $style = null): void
{
    if (is_string($was)) { // Wenn noch ganz alte Schreibweise, in Bestandteile zerlegen.
        $was = $GLOBALS['migrations']->SplitupOldTitel($was);
    }

    list($str_start_date, $str_end_date) = $GLOBALS['migrations']->GetStartEndDateAsString($wannd);
    list($str_start_time, $str_end_time) = $GLOBALS['migrations']->GetStartEndTimeAsString($wannt);

    $DateTimeStart = $GLOBALS['migrations']->GetStartDateTimeSQL($str_start_date, $str_start_time);
    $DateTimeEnd   = $GLOBALS['migrations']->GetEndDateTimeSQL($str_end_date, $str_end_time, $DateTimeStart);

    if (!$DateTimeStart) {
        throw new \Exception("ballermann");
    }

    $GLOBALS['migrations']->addInsert(
        new Event(
            titel:    $was['titel'],
            subtitel: $was['subtitel'],
            start:    $DateTimeStart,
            end:      $DateTimeEnd,
            ort:      $wo,
            link:     $was['link']
        )
    );
}

function sessionCount()
{
    static $sessionCount = 0;
    return ++$sessionCount;
}

function title($name, $link = "", $info = "", $name2 = "", $name3 = "")
{
    $link_head = $link_tail = "";
    if (!empty($link)) {
        $link_head = "<a href=\"" . $link . "\" title=\"" . (!empty($info) ? $info : "zur Seite") . "\" target=\"_blank\" style=\"text-decoration: none; color: inherit;\">";
        $link_tail = "</a>";
    }
    return $link_head . $name . (!empty($name2) ? "<br /><small>" . $name2 . "</small>" : "") . (!empty($name3) ? "<br /><small>" . $name3 . "</small>" : "") . $link_tail;
}

function title_series($event, $name = "", $link = "", $info = "", $name2 = "", $name3 = "", $options = "")
{
    switch (strtoupper($event)) {
        case "JAZZTAGE":
            $eventName = "Jazztage " . $options;
            break;
        case "SESSION":
            $nSession = sessionCount();
            $eventName = ($nSession > 0 ? $nSession . ". " : "") . "Jam Session";
            break;
        default:
            $eventName = ucFirst($event);
    }
    return title((empty($eventName) ? "" : $eventName) . (empty($name) ?  "" : " - " . $name), $link, $info, $name2, $name3);
}