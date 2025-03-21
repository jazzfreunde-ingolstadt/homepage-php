<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20250314171248 extends AbstractMigration
{
    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return 'DoctrineMigrations';
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
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql('ALTER TABLE orte RENAME event_locations');
        $this->addSql('ALTER TABLE confirmation_contracts CHANGE state state ENUM(\'pending\', \'confirmed\', \'cancelled\') DEFAULT \'pending\' NOT NULL');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AB62F846A');
        $this->addSql('DROP INDEX IDX_5387574AB62F846A ON events');
        $this->addSql('ALTER TABLE events CHANGE category category ENUM(\'none\', \'session\', \'jazztage\') DEFAULT \'none\' NOT NULL, CHANGE titel title VARCHAR(255) NOT NULL, CHANGE subtitel subtitle VARCHAR(255) DEFAULT NULL, CHANGE ort_id location_id INT NOT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A64D218E FOREIGN KEY (location_id) REFERENCES event_locations (id)');
        $this->addSql('CREATE INDEX IDX_5387574A64D218E ON events (location_id)');
        $this->addSql('ALTER TABLE known_mails CHANGE handle handle ENUM(\'no-reply\', \'jazzletter\') NOT NULL');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql('ALTER TABLE event_locations RENAME orte');
        $this->addSql('ALTER TABLE known_mails CHANGE handle handle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A64D218E');
        $this->addSql('DROP INDEX IDX_5387574A64D218E ON events');
        $this->addSql('ALTER TABLE events CHANGE category category VARCHAR(0) DEFAULT \'none\' NOT NULL, CHANGE title titel VARCHAR(255) NOT NULL, CHANGE subtitle subtitel VARCHAR(255) DEFAULT NULL, CHANGE location_id ort_id INT NOT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AB62F846A FOREIGN KEY (ort_id) REFERENCES orte (id)');
        $this->addSql('CREATE INDEX IDX_5387574AB62F846A ON events (ort_id)');
        $this->addSql('ALTER TABLE confirmation_contracts CHANGE state state VARCHAR(0) DEFAULT \'pending\' NOT NULL');
    }
}
