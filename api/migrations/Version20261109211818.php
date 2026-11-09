<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261109211818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create notification delivery idempotency records';
    }

    public function isTransactional(): bool
    {
        return false;
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            'CREATE TABLE notification_deliveries (
                identity_hash VARCHAR(64) NOT NULL,
                created_at DATETIME NOT NULL,
                PRIMARY KEY(identity_hash)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB',
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE notification_deliveries');
    }
}
