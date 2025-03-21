<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20250320100343 extends AbstractMigration
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

        $this->addSql('ALTER TABLE confirmation_contracts CHANGE state state ENUM(\'pending\', \'confirmed\', \'cancelled\') DEFAULT \'pending\' NOT NULL');
        $this->addSql('ALTER TABLE events CHANGE category category ENUM(\'none\', \'session\', \'jazztage\', \'jazz-and-literature\') DEFAULT \'none\' NOT NULL');
        $this->addSql('ALTER TABLE known_mails CHANGE handle handle ENUM(\'no-reply\', \'jazzletter\') NOT NULL');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql('ALTER TABLE events CHANGE category category VARCHAR(0) DEFAULT \'none\' NOT NULL');
        $this->addSql('ALTER TABLE confirmation_contracts CHANGE state state VARCHAR(0) DEFAULT \'pending\' NOT NULL');
        $this->addSql('ALTER TABLE known_mails CHANGE handle handle VARCHAR(0) NOT NULL');
    }
}
