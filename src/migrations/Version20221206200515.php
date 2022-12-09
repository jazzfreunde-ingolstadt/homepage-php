<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20221206200515 extends AbstractMigration
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
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql('CREATE TABLE orte (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE events ADD ort_id INT NOT NULL');
        $this->addSql('INSERT INTO `orte` (name) SELECT DISTINCT ort FROM `events`');
        $this->addSql('UPDATE `events` SET ort_id = (SELECT id FROM `orte` WHERE name = `events`.ort)');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AB62F846A FOREIGN KEY (ort_id) REFERENCES orte (id)');
        $this->addSql('CREATE INDEX IDX_5387574AB62F846A ON events (ort_id)');
        $this->addSql('ALTER TABLE `events` DROP COLUMN `ort`');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql('ALTER TABLE `events` ADD `ort` VARCHAR(255) NOT NULL');
        $this->addSql('UPDATE `events` SET `ort` = (SELECT name FROM `orte` WHERE id = `events`.ort_id)');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574AB62F846A');
        $this->addSql('DROP TABLE orte');
        $this->addSql('DROP INDEX IDX_5387574AB62F846A ON events');
        $this->addSql('ALTER TABLE events DROP ort_id');
    }
}
