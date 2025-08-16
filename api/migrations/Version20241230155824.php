<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20241230155824 extends AbstractMigration
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

        $this->addSql('CREATE TABLE confirmation_contracts (uuid BINARY(16) NOT NULL, token VARCHAR(255) NOT NULL, open_for_confirmation_until DATETIME NOT NULL, state ENUM(\'pending\', \'confirmed\', \'cancelled\') DEFAULT \'pending\' NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE events CHANGE category category ENUM(\'none\', \'session\', \'jazztage\') DEFAULT \'none\' NOT NULL');
        $this->addSql('ALTER TABLE known_mails CHANGE address address VARCHAR(254) NOT NULL');
        $this->addSql('ALTER TABLE newsletter_subscriptions ADD confirmation_id BINARY(16) DEFAULT NULL, CHANGE email email VARCHAR(254) NOT NULL');
        $this->addSql('ALTER TABLE newsletter_subscriptions ADD CONSTRAINT FK_B3C13B0B6BACE54E FOREIGN KEY (confirmation_id) REFERENCES confirmation_contracts (uuid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B3C13B0B6BACE54E ON newsletter_subscriptions (confirmation_id)');
        $this->addSql('ALTER TABLE roles CHANGE uuid uuid BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE users_groups CHANGE user_uuid user_uuid BINARY(16) NOT NULL, CHANGE role_uuid role_uuid BINARY(16) NOT NULL');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql('DROP TABLE confirmation_contracts');
        $this->addSql('ALTER TABLE newsletter_subscriptions DROP FOREIGN KEY FK_B3C13B0B6BACE54E');
        $this->addSql('DROP INDEX UNIQ_B3C13B0B6BACE54E ON newsletter_subscriptions');
        $this->addSql('ALTER TABLE newsletter_subscriptions DROP confirmation_id, CHANGE email email VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE roles CHANGE uuid uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE users_groups CHANGE user_uuid user_uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE role_uuid role_uuid BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE known_mails CHANGE address address VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE events CHANGE category category VARCHAR(0) DEFAULT \'none\' NOT NULL');
    }
}
