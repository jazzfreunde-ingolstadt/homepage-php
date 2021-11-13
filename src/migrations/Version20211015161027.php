<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;
use Exception;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\App\Structures\DateTimeSQL;

final class Version20211014210300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function isTransactional(): bool
    {
        return true;
    }

    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE IF NOT EXISTS events (id INT AUTO_INCREMENT NOT NULL, titel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, subtitel VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, `start` DATETIME NOT NULL, `end` DATETIME NOT NULL, ort VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');

        $GLOBALS['migrations'] = $this;

        try {
            define('PAGE', 'import');

            require dirname(__DIR__).'/legacy/data/importVA.php';
            require dirname(__DIR__).'/legacy/data/termine.php';
        } catch (Exception $e) {
            $this->abortIf(true, sprintf('Failed importing Events in "%s"'.PHP_EOL.$e->getMessage(), static::class));
        }
    }

    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE events');
    }

    public function addInsert(Event $event): void
    {
        $this->addSql(
            'INSERT INTO events (titel, subtitel, start, end, ort, link) VALUES (?, ?, ?, ?, ?, ?)',
            [
                $event->titel,
                $event->subtitel,
                $event->start,
                $event->end,
                $event->ort,
                $event->link,
            ]
        );
    }

    private function sessionCount()
    {
        static $count;

        return ++$count; // Wird im Orginal über eine Globale geregelt.
    }

    private function title_series($event, $name = "", $link = "", $info = "", $name2 = "", $name3 = "", $options = "")
    {
        switch (strtoupper($event)) {
            case "JAZZTAGE":
                $eventName = "Jazztage ".$options;
                break;
            case "SESSION":
                $nSession = $this->sessionCount();
                $eventName = ($nSession > 0 ? $nSession.". " : "")."Jam Session";
                break;
            default:
                $eventName = ucfirst($event);
        }

        return $this->title((empty($eventName) ? "" : $eventName).(empty($name) ?  "" : " - ".$name), $link, $info, $name2, $name3);
    }

    private function title($name, $link = "", $info = "", $name2 = "", $name3 = "")
    {
        return [
            'titel' => $name,
            'subtitel' => $name2.!empty($name3) ? "|${name3}" : '',
            'link' => $link,
        ];
    }

    private function cast_e(DOMNode $node): DOMElement
    {
        if ($node) {
            if ($node->nodeType === XML_ELEMENT_NODE) {
                return $node;
            }
        }

        return null;
    }

    private function GetLink_href(DOMNode $link_node): string
    {
        return $this->cast_e($link_node)->getAttribute('href');
    }

    private function GetTitelWithoutHtmlRecursive(DOMNode $root): array
    {
        $titel = [];

        foreach ($root->childNodes as $node) {
            if ($node instanceof DOMText) {
                if (!empty($node->wholeText)) {
                    array_push($titel, $node->wholeText);
                }
            }

            if ($node->hasChildNodes()) {
                $titel = array_merge_recursive($titel, $this->GetTitelWithoutHtmlRecursive($node));
            }
        }

        return $titel;
    }

    private function GetTitel(DOMNode $root): string
    {
        $titel = [];

        foreach ($root->childNodes as $node) {
            if (!$node->hasChildNodes()) {
                if (!empty($node->wholeText)) {
                    array_push($titel, $node->wholeText);
                }
            }
        }

        return implode('', $titel);
    }

    private function GetSubtitels(DOMDocument $dom): string
    {
        $subtitel = [];

        foreach ($dom->getElementsByTagName('small') as $node) {
            array_push($subtitel, implode('', $this->GetTitelWithoutHtmlRecursive($node)));
        }

        return implode('|', array_filter($subtitel, fn ($str) => !empty($str)));
    }

    private function GetLink(DOMDocument $dom): ?string
    {

        foreach ($dom->getElementsByTagName('a') as $node) {
            return $this->GetLink_href($node);
        }

        return null;
    }

    public function SplitupOldTitel(string $was): array
    {
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        @$dom->loadHTML(utf8_decode("<div id=\"root\">${was}</div>"));

        $titel = [];
        $titel['titel'] = $this->GetTitel($dom->getElementByID('root'));
        $titel['subtitel'] = $this->GetSubtitels($dom);
        $titel['link'] = $this->GetLink($dom) ?? '';

        return $titel;
    }

    public function GetStartEndDateAsString($wannd): array
    {
        $start_end = explode('-', $wannd);

        $str_start_date = $start_end[0];
        if (array_key_exists(1, $start_end)) {
            $str_end_date = $start_end[1];
        }

        $date_start = explode('.', trim($str_start_date));

        if (isset($str_end_date)) {
            $date_end = explode('.', trim($str_end_date));

            // Bei von bis Daten Monat und Jahr übernehmen.
            if (empty($date_start[1])) {
                $date_start[1] = $date_end[1];
            }
            if (empty($date_start[2])) {
                $date_start[2] = $date_end[2];
            }
        }

        return [
            trim($date_start[0]).'.'.trim($date_start[1]).'.'.trim($date_start[2]),
            isset($str_end_date) ? trim($date_end[0]).'.'.trim($date_end[1]).'.'.trim($date_end[2]) : null,
        ];
    }

    const TIME_AS_WORD = ['9:00' => 'vormittags', '15:00' => 'nachmittags', '0:00' => 'ganztags'];

    public function GetStartEndTimeAsString($wannt): array
    {
        $start_end = explode('-', $wannt);

        if ($time = array_search($start_end[0], self::TIME_AS_WORD)) {
            $start_end[0] = self::TIME_AS_WORD[$time];
        }

        $time_start = explode(':', $start_end[0]);

        if (2 > count($time_start)) {
            $time_start = null;
        }

        if (isset($start_end[1])) {
            if ($time = array_search($start_end[1], self::TIME_AS_WORD)) {
                $start_end[1] = self::TIME_AS_WORD[$time];
            }

            $time_end = explode(':', $start_end[1]);
            if (2 > count($time_end)) {
                $time_end = null;
            }
        }

        return [
            isset($time_start) ? trim($time_start[0]).':'.trim($time_start[1]) : '0:00',
            isset($time_end) ? trim($time_end[0]).':'.trim($time_end[1]) : null,
        ];
    }

    public function GetStartDateTimeSQL(string $date, string $time): ?DateTimeSQL
    {
        list($day, $month, $year) = explode('.', trim($date));
        list($hour, $min) = explode(':', trim($time));

        $start = new DateTimeSQL();
        $start->setDate((int) $year, (int) $month, (int) $day);
        $start->setTime((int) $hour, (int) $min);

        return $start;
    }

    public function GetEndDateTimeSQL(?string $date, ?string $time, DateTimeSQL $start): DateTimeSQL
    {
        if (!$date) { // Wenn kein Enddatum = Start
            $date = $start->format('d.m.Y');
        }

        if (!$time) { // Wenn keine Endzeit = Start
            $time = $start->format('H:i');
        }

        list($day, $month, $year) = explode('.', trim($date));
        list($hour, $min) = explode(':', trim($time));

        $end = new DateTimeSQL();
        $start->setDate((int) $year, (int) $month, (int) $day);
        $start->setTime((int) $hour, (int) $min);

        if ($end < $start) { // Ende darf nicht vor Start liegen
            $end = $start;
        }

        $diff = $start->diff($end); // Wenn nur ein Datum angegeben wurde Endzeit auf 23:59 setzen
        if ($diff->d > 0 && ($diff->h + $diff->h) == 0) {
            $end->setTime(23, 59, 59);
        }

        return $end;
    }
}
