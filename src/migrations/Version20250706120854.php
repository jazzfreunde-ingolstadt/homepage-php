<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration
 */
final class Version20250706120854 extends AbstractMigration
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

        $this->addSql(<<<'SQL'
            UPDATE confirmation_contracts SET token = SUBSTRING(MD5(CONCAT(uuid, request_time)), 1, 32)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE confirmation_contracts CHANGE token token CHAR(32) NOT NULL, CHANGE state state ENUM('new', 'pending', 'confirmed', 'cancelled') DEFAULT 'new' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_DD197D9D5F37A13B ON confirmation_contracts (token)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE events CHANGE category category ENUM('none', 'session', 'jazztage', 'jazz-and-literature') DEFAULT 'none' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE known_mails CHANGE handle handle ENUM('no-reply', 'jazzletter') NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD token CHAR(32) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E95F37A13B ON users (token)
        SQL);
        $this->addSql(<<<'SQL'
            UPDATE users SET token = SUBSTRING(MD5(CONCAT(uuid, email)), 1, 32)
        SQL);
    }

    /**
     * {@inheritDoc}
     */
    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        $this->addSql(<<<'SQL'
            ALTER TABLE known_mails CHANGE handle handle VARCHAR(0) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE events CHANGE category category VARCHAR(0) DEFAULT 'none' NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E95F37A13B ON users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP token
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_DD197D9D5F37A13B ON confirmation_contracts
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE confirmation_contracts CHANGE token token VARCHAR(255) NOT NULL, CHANGE state state VARCHAR(0) DEFAULT 'new' NOT NULL
        SQL);
    }
}
