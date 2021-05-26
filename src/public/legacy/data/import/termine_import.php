<?php

use Jazzfreunde\App\Models\Termin;
use Jazzfreunde\App\Models\TermineModel;
use Jazzfreunde\Structures\DateTimeSQL;

$app = include_once('../../app.php');

function sessionCount()
{
    static $count;

    return ++$count; // Wird im Orginal über eine Globale geregelt.
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

function title($name, $link = "", $info = "", $name2 = "", $name3 = "")
{
    return [
        'titel' => $name,
        'subtitel' => $name2 . !empty($name3) ? "|${name3}" : '',
        'link' => $link
    ];
}

function cast_e(DOMNode $node): DOMElement
{
    if ($node) {
        if ($node->nodeType === XML_ELEMENT_NODE) {
            return $node;
        }
    }
    return null;
}

function GetLink_href(DOMNode $link_node): string
{
    return cast_e($link_node)->getAttribute('href');
}

function GetTitelWithoutHtmlRecursive(DOMNode $root): array
{
    $titel = [];

    foreach ($root->childNodes as $node) {
        if ($node instanceof DOMText) {
            if (!empty($node->wholeText))
                array_push($titel, $node->wholeText);
        }

        if ($node->hasChildNodes()) {
            $titel = array_merge_recursive($titel, GetTitelWithoutHtmlRecursive($node));
        }
    }

    return $titel;
}

function GetTitel(DOMNode $root): string
{
    $titel = [];

    foreach ($root->childNodes as $node) {
        if (!$node->hasChildNodes()) {
            if (!empty($node->wholeText))
                array_push($titel, $node->wholeText);
        }
    }

    return implode('', $titel);
}

function GetSubtitels(DOMDocument $dom): string
{
    $subtitel = [];

    foreach ($dom->getElementsByTagName('small') as $node) {
        array_push($subtitel, implode('', GetTitelWithoutHtmlRecursive($node)));
    }

    return implode('|', array_filter($subtitel, fn ($str) => !empty($str)));
}

function GetLink(DOMDocument $dom): ?string
{

    foreach ($dom->getElementsByTagName('a') as $node) {
        return GetLink_href($node);
    }

    return null;
}

function SplitupOldTitel(string $was): array
{
    $dom = new DOMDocument();
    $dom->encoding = 'utf-8';
    @$dom->loadHTML(utf8_decode("<div id=\"root\">${was}</div>"));

    $titel = [];
    $titel['titel'] = GetTitel($dom->getElementByID('root'));
    $titel['subtitel'] = GetSubtitels($dom);
    $titel['link'] = GetLink($dom) ?? '';

    return $titel;
}

function GetStartEndDateAsString($wannd): array
{
    $start_end = explode('-', $wannd);

    $str_start_date = $start_end[0];
    if (array_key_exists(1, $start_end))
        $str_end_date = $start_end[1];

    $date_start = explode('.', trim($str_start_date));

    if (isset($str_end_date)) {
        $date_end = explode('.', trim($str_end_date));

        // Bei von bis Daten Monat und Jahr übernehmen.
        if (empty($date_start[1]))
            $date_start[1] = $date_end[1];
        if (empty($date_start[2]))
            $date_start[2] = $date_end[2];
    }

    return [
        trim($date_start[0]) . '.' . trim($date_start[1]) . '.' . trim($date_start[2]),
        isset($str_end_date) ? trim($date_end[0]) . '.' . trim($date_end[1]) . '.' . trim($date_end[2]) : null,
    ];
}

function GetStartEndTimeAsString($wannt): array
{
    $start_end = explode('-', $wannt);

    $zeit_wort = ['9:00' => 'vormittags', '15:00' => 'nachmittags', '0:00' => 'ganztags'];

    if ($time = in_array($start_end[0], $zeit_wort))
        $start_end[0] = $time;

    $time_start = explode(':', $start_end[0]);

    if (2 > count($time_start))
        $time_start = null;

    if (isset($start_end[1])) {
        if ($time = in_array($start_end[1], $zeit_wort))
            $start_end[1] = $time;

        $time_end = explode(':', $start_end[1]);
        if (2 > count($time_end))
            $time_end = null;
    }

    return [
        isset($time_start) ? trim($time_start[0]) . ':' .  trim($time_start[1]) : '0:00',
        isset($time_end) ? trim($time_end[0]) . ':' . trim($time_end[1]) : null,
    ];
}

function GetStartDateTimeSQL(string $date, string $time): ?DateTimeSQL
{
    list($day, $month, $year) = explode('.', trim($date));
    list($hour, $min) = explode(':', trim($time));

    $start = new DateTimeSQL();
    $start->setDate($year, $month, $day);
    $start->setTime($hour, $min);

    return $start;
}

function GetEndDateTimeSQL(?string $date, ?string $time, ?DateTimeSQL $start): DateTimeSQL
{
    if (!$date) // Wenn kein Enddatum = Start
        $date = $start->format('d.m.Y');

    if (!$time) { // Wenn keine Endzeit = Start
        $time = $start->format('H:i');
    }

    list($day, $month, $year) = explode('.', trim($date));
    list($hour, $min) = explode(':', trim($time));

    $end = new DateTimeSQL();
    $end->setDate($year, $month, $day);
    $end->setTime($hour, $min);

    if ($end < $start) // Ende darf nicht vor Start liegen
        $end = $start;

    $diff = $start->diff($end); // Wenn nur ein Datum angegeben wurde Endzeit auf 23:59 setzen
    if ($diff->d > 0 && ($diff->h + $diff->h) == 0)
        $end->setTime(23, 59, 59);

    return $end;
}

function setVA($wannd, $wannt, $was, $wo, $imgid = null, $videolink = null, $style = null)
{
    global $termin_model;

    if (is_string($was)) { // Wenn noch ganz alte Schreibweise, in Bestandteile zerlegen.
        $was = SplitupOldTitel($was);
    }

    list($str_start_date, $str_end_date) = GetStartEndDateAsString($wannd);
    list($str_start_time, $str_end_time) = GetStartEndTimeAsString($wannt);

    $DateTimeSQL_start = GetStartDateTimeSQL($str_start_date, $str_start_time);
    $DateTimeSQL_end = GetEndDateTimeSQL($str_end_date, $str_end_time, $DateTimeSQL_start);

    $termin_model->new(
        new Termin(
            null,
            $was['titel'],
            $was['subtitel'],
            $DateTimeSQL_start,
            $DateTimeSQL_end,
            $wo,
            $was['link']
        )
    );
}

$database = $app->DatabaseContext();
$connection = $database->GetConnection();
$termin_model = new TermineModel($database);

$connection->beginTransaction();
try {
    define('PAGE', 'import');
?>
    <ol>
        <?php
        require('../termine.php');
        ?>
    </ol>
<?php
    $connection->commit();
} catch (Exception $e) {
    var_dump($e->getMessage());
    $connection->Rollback();
}
