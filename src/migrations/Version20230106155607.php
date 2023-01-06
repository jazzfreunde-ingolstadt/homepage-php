<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20230106155607 extends AbstractMigration
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

        $this->addSql('ALTER TABLE events ADD category ENUM(\'none\', \'session\') DEFAULT \'none\' NOT NULL COMMENT \'(DC2Type:event_category)\'');
        $this->addSql('UPDATE `events` SET `category` = \'session\' WHERE titel LIKE \'%session%\';');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql('ALTER TABLE events DROP type');
    }
}
