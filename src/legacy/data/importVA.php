<?php

declare(strict_types=1);

use Jazzfreunde\App\Entity\Event;

function setVA(string $wannd, string $wannt, string|array $was, string $wo, ?string $imgid = null, ?string $videolink = null, ?string $style = null): void
{
    if (is_string($was)) { // Wenn noch ganz alte Schreibweise, in Bestandteile zerlegen.
        $was = $GLOBALS['migrations']->splitupOldTitel($was);
    }

    list($str_start_date, $str_end_date) = $GLOBALS['migrations']->getStartEndDateAsString($wannd);
    list($str_start_time, $str_end_time) = $GLOBALS['migrations']->getStartEndTimeAsString($wannt);

    $DateTimeStart = $GLOBALS['migrations']->getStartDateTime($str_start_date, $str_start_time);
    $DateTimeEnd   = $GLOBALS['migrations']->getEndDateTime($str_end_date, $str_end_time, $DateTimeStart);

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

/**
 * Session-Zähler
 *
 * @return int
 */
function sessionCount()
{
    static $sessionCount = 0;
    return ++$sessionCount;
}

/**
 * @param string $name
 * @param string $link
 * @param string $info
 * @param string $name2
 * @param string $name3
 * @return void
 */
function title(string $name, string $link = "", string $info = "", string $name2 = "", string $name3 = ""): array
{
    return [
        'titel' => $name,
        'subtitel' => $name2.empty($name3) ? '' : '|'.$name3,
        'link' => $link
    ];
}

/**
 * @param string $event
 * @param string $name
 * @param string $link
 * @param string $info
 * @param string $name2
 * @param string $name3
 * @param string $options
 *
 * @return string
 */
function title_series(string $event, string $name = "", string $link = "", string $info = "", string $name2 = "", string $name3 = "", string $options = "")
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