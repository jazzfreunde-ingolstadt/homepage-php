<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20250329204420 extends AbstractMigration
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
        
        $this->addSql('ALTER TABLE newsletter_subscriptions DROP FOREIGN KEY IF EXISTS FK_B3C13B0B6BACE54E');
        $this->addSql("
            UPDATE newsletter_subscriptions
                SET confirmation_id = UNHEX(REPLACE(UUID(), '-', ''))
        ");
        $this->addSql("
            INSERT INTO confirmation_contracts (uuid, token, open_for_confirmation_until, state)
                SELECT newsletter_subscriptions.confirmation_id, HEX(SHA2(UUID(), 256)), NOW(), 'confirmed'
                FROM newsletter_subscriptions
        ");
        $this->addSql('ALTER TABLE newsletter_subscriptions ADD CONSTRAINT FK_B3C13B0B6BACE54E FOREIGN KEY (confirmation_id) REFERENCES confirmation_contracts (uuid)');
        $this->addSql('ALTER TABLE newsletter_subscriptions CHANGE confirmation_id confirmation_id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(254) NOT NULL');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql('ALTER TABLE newsletter_subscriptions CHANGE confirmation_id confirmation_id BINARY(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(255) NOT NULL');
    }
}
