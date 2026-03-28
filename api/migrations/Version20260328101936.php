<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20260328101936 extends AbstractMigration
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
        return false;
    }

    /**
     * {@inheritDoc}
     */
    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql('ALTER TABLE newsletter_subscriptions DROP FOREIGN KEY `FK_B3C13B0B6BACE54E`');
        $this->addSql('ALTER TABLE newsletter_subscriptions ADD CONSTRAINT FK_B3C13B0B6BACE54E FOREIGN KEY (confirmation_id) REFERENCES confirmation_contracts (uuid) ON DELETE CASCADE');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql('ALTER TABLE newsletter_subscriptions DROP FOREIGN KEY FK_B3C13B0B6BACE54E');
        $this->addSql('ALTER TABLE newsletter_subscriptions ADD CONSTRAINT `FK_B3C13B0B6BACE54E` FOREIGN KEY (confirmation_id) REFERENCES confirmation_contracts (uuid)');
    }
}
