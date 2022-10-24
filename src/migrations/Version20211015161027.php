<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use DateTime;
use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;
use Exception;
use Jazzfreunde\App\Entity\Event;
use Jazzfreunde\Type\DateTimeSQL;

/**
 * Import alter Verantstaltungen
 */
final class Version20211014210300 extends AbstractMigration
{
    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'Import alter Verantstaltungen';
    }

    /**
     * {@inheritDoc}
     */
    public function isTransactional(): bool
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql(
            'CREATE TABLE events
                (
                    id INT AUTO_INCREMENT NOT NULL,
                    titel VARCHAR(255) NOT NULL,
                    subtitel VARCHAR(255) DEFAULT NULL,
                    start DATETIME NOT NULL,
                    end DATETIME NOT NULL,
                    ort VARCHAR(255) NOT NULL,
                    link VARCHAR(255) DEFAULT NULL,
                    PRIMARY KEY(id)
                ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );

        $GLOBALS['migrations'] = $this;

        try {
            define('PAGE', 'import');

            require dirname(__DIR__).'/legacy/data/importVA.php';
            require dirname(__DIR__).'/legacy/data/termine.php';
        } catch (Exception $e) {
            $this->abortIf(true, sprintf('Failed importing Events in "%s"'.PHP_EOL.$e->getMessage(), static::class));
        }
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql('DROP TABLE events');
    }

    /**
     * @param Event $event
     */
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

    /**
     * Spaltet den Titel in einzelne Teile auf.
     *
     * @param string $was
     *
     * @return array
     */
    public function splitupOldTitel(string $was): array
    {
        $dom = new DOMDocument();
        $dom->encoding = 'utf-8';
        @$dom->loadHTML(utf8_decode("<div id=\"root\">${was}</div>"));

        $titel = [];
        $titel['titel'] = $this->getTitel($dom->getElementByID('root'));
        $titel['subtitel'] = $this->getSubtitels($dom);
        $titel['link'] = $this->getLink($dom) ?? '';

        return $titel;
    }

    /**
     * Ermittelt Start- und Endezeitdatum der Veranstaltung.
     *
     * @param string $wannd
     *
     * @return array
     */
    public function getStartEndDateAsString(string $wannd): array
    {
        $startEnd = explode('-', $wannd);

        $strStartDate = $startEnd[0];
        if (array_key_exists(1, $startEnd)) {
            $strEndDate = $startEnd[1];
        }

        $dateStart = explode('.', trim($strStartDate));

        if (isset($strEndDate)) {
            $dateEnd = explode('.', trim($strEndDate));

            // Bei von bis Daten Monat und Jahr übernehmen.
            if (empty($dateStart[1])) {
                $dateStart[1] = $dateEnd[1];
            }
            if (empty($dateStart[2])) {
                $dateStart[2] = $dateEnd[2];
            }
        }

        return [
            trim($dateStart[0]).'.'.trim($dateStart[1]).'.'.trim($dateStart[2]),
            isset($strEndDate) ? trim($dateEnd[0]).'.'.trim($dateEnd[1]).'.'.trim($dateEnd[2]) : null,
        ];
    }

    const TIME_AS_WORD = ['9:00' => 'vormittags', '15:00' => 'nachmittags', '0:00' => 'ganztags'];

    /**
     * Ermittelt Start- und Endezeit der Veranstaltung.
     *
     * @param string $wannt
     *
     * @return array
     */
    public function getStartEndTimeAsString(string $wannt): array
    {
        $startEnd = explode('-', $wannt);

        if ($time = array_search($startEnd[0], self::TIME_AS_WORD)) {
            $startEnd[0] = self::TIME_AS_WORD[$time];
        }

        $timeStart = explode(':', $startEnd[0]);

        if (2 > count($timeStart)) {
            $timeStart = null;
        }

        if (isset($startEnd[1])) {
            if ($time = array_search($startEnd[1], self::TIME_AS_WORD)) {
                $startEnd[1] = self::TIME_AS_WORD[$time];
            }

            $timeEnd = explode(':', $startEnd[1]);
            if (2 > count($timeEnd)) {
                $timeEnd = null;
            }
        }

        return [
            isset($timeStart) ? trim($timeStart[0]).':'.trim($timeStart[1]) : '0:00',
            isset($timeEnd) ? trim($timeEnd[0]).':'.trim($timeEnd[1]) : null,
        ];
    }

    /**
     * Wandelt Enddatum und Endzeit in ein Datum um.
     *
     * @param string $date
     * @param string $time
     *
     * @return DateTimeSQL
     */
    public function getStartDateTime(string $date, string $time): DateTimeSQL
    {
        list($day, $month, $year) = explode('.', trim($date));
        list($hour, $min) = explode(':', trim($time));

        $start = new DateTimeSQL();
        $start->setDate((int) $year, (int) $month, (int) $day);
        $start->setTime((int) $hour, (int) $min);

        return $start;
    }

    /**
     * Wandelt Startdatum und Startzeit in ein Datum um.
     *
     * @param string      $date
     * @param string|null $time
     * @param DateTime    $start
     *
     * @return DateTimeSQL
     */
    public function getEndDateTime(?string $date, ?string $time, DateTime $start): DateTimeSQL
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

    /**
     * Ermittelt den Link zu einer Veranstaltung.
     *
     * @param DOMDocument $dom
     *
     * @return string
     */
    public function getLink(DOMDocument $dom): ?string
    {

        foreach ($dom->getElementsByTagName('a') as $node) {
            return $this->getLinkhref($node);
        }

        return null;
    }

    /**
     * @param DOMNode $node
     *
     * @return DOMElement|null
     */
    private function castE(DOMNode $node): DOMElement|null
    {
        if ($node) {
            if ($node->nodeType === XML_ELEMENT_NODE) {
                return $node;
            }
        }

        return null;
    }

    /**
     * Extrahiert die URL eines Link-Tags.
     *
     * @param DOMNode $linkNode
     *
     * @return string
     */
    private function getLinkhref(DOMNode $linkNode): string
    {
        return $this->castE($linkNode)->getAttribute('href');
    }

    /**
     * Extrahiert den Titel aus html-Elementen.
     *
     * @param DOMNode $root
     *
     * @return array
     */
    private function getTitelWithoutHtmlRecursive(DOMNode $root): array
    {
        $titel = [];

        foreach ($root->childNodes as $node) {
            if ($node instanceof DOMText) {
                if (!empty($node->wholeText)) {
                    array_push($titel, $node->wholeText);
                }
            }

            if ($node->hasChildNodes()) {
                $titel = array_merge_recursive($titel, $this->getTitelWithoutHtmlRecursive($node));
            }
        }

        return $titel;
    }

    /**
     * Ermittelt den Titel.
     *
     * @param DOMNode $root
     *
     * @return string
     */
    private function getTitel(DOMNode $root): string
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

    /**
     * Ermittelt den Untertitel.
     *
     * @param DOMDocument $dom
     *
     * @return string
     */
    private function getSubtitels(DOMDocument $dom): string
    {
        $subtitel = [];

        foreach ($dom->getElementsByTagName('small') as $node) {
            array_push($subtitel, implode('', $this->getTitelWithoutHtmlRecursive($node)));
        }

        return implode('|', array_filter($subtitel, fn ($str) => !empty($str)));
    }
}
