<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQL80Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20221230003939 extends AbstractMigration
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

        $this->addSql('CREATE TABLE newsletter_subscriptions (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, creation_time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_B3C13B0BE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform() instanceof MySQL80Platform, 'Migration can only be executed safely on \'mysql 8.0\' and higher.');

        $this->addSql('DROP TABLE newsletter_subscriptions');
    }
}
