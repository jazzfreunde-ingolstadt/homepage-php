<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20250102023142 extends AbstractMigration
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

        $this->addSql('ALTER TABLE confirmation_contracts CHANGE state state ENUM(\'pending\', \'confirmed\', \'cancelled\') DEFAULT \'pending\' NOT NULL');
        $this->addSql('ALTER TABLE events CHANGE category category ENUM(\'none\', \'session\', \'jazztage\') DEFAULT \'none\' NOT NULL');
        $this->addSql('ALTER TABLE known_mails CHANGE handle handle ENUM(\'no-reply\', \'jazzletter\') NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE uuid uuid BINARY(16) NOT NULL');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql('ALTER TABLE events CHANGE category category VARCHAR(0) DEFAULT \'none\' NOT NULL');
        $this->addSql('ALTER TABLE confirmation_contracts CHANGE state state VARCHAR(0) DEFAULT \'pending\' NOT NULL');
        $this->addSql('ALTER TABLE known_mails CHANGE handle handle VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE uuid uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
    }
}
