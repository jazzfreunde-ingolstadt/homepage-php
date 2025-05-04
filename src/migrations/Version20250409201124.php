<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20250409201124 extends AbstractMigration
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

        $this->addSql('
            CREATE TABLE `messenger_messages` (
                `id` bigint(20) NOT NULL AUTO_INCREMENT,
                `body` longtext NOT NULL,
                `headers` longtext NOT NULL,
                `queue_name` varchar(190) NOT NULL,
                `created_at` datetime NOT NULL,
                `available_at` datetime NOT NULL,
                `delivered_at` datetime DEFAULT NULL,
                PRIMARY KEY(id)
            ) CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`
        ');

        $this->addSql('
            ALTER TABLE `messenger_messages`
                ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
                ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
                ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
        ');
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql('
            DROP TABLE `messenger_messages`
        ');
    }
}
