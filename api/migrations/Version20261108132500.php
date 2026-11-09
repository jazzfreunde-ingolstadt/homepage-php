<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20261108132500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Enforce unique confirmable entity identity hashes';
    }

    public function isTransactional(): bool
    {
        return false;
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform,
            'Migration can only be executed safely on \'mariadb 10.6\' and higher.',
        );

        $this->abortIf(
            false !== $this->connection->fetchOne(
                'SELECT identity_hash
                FROM (
                    SELECT CASE confirmable.discriminator
                        WHEN \'newsletter_subscription\' THEN SHA2(CONCAT(
                            \'Jazzfreunde\', CHAR(92), \'Api\', CHAR(92), \'Entity\', CHAR(92),
                            \'NewsletterSubscription\', CHAR(0), LOWER(confirmable.email)
                        ), 256)
                        WHEN \'notification_subscription\' THEN SHA2(CONCAT(
                            \'Jazzfreunde\', CHAR(92), \'Api\', CHAR(92), \'Entity\', CHAR(92),
                            \'Notification\', CHAR(92), \'NotificationSubscription\', CHAR(0),
                            LOWER(confirmable.email), CHAR(0), LOWER(subscription.resource_scope)
                        ), 256)
                    END AS identity_hash
                    FROM confirmable_entities confirmable
                    LEFT JOIN notification_subscriptions subscription ON subscription.uuid = confirmable.uuid
                ) identities
                WHERE identity_hash IS NOT NULL
                GROUP BY identity_hash
                HAVING COUNT(*) > 1
                LIMIT 1',
            ),
            'Cannot enforce unique confirmable entity identities while duplicates exist.',
        );

        $this->addSql('ALTER TABLE confirmable_entities ADD identity_hash VARCHAR(64) DEFAULT NULL');
        $this->addSql(
            'UPDATE confirmable_entities confirmable
            LEFT JOIN notification_subscriptions subscription ON subscription.uuid = confirmable.uuid
            SET confirmable.identity_hash = CASE confirmable.discriminator
                WHEN \'newsletter_subscription\' THEN SHA2(CONCAT(
                    \'Jazzfreunde\', CHAR(92), \'Api\', CHAR(92), \'Entity\', CHAR(92),
                    \'NewsletterSubscription\', CHAR(0), LOWER(confirmable.email)
                ), 256)
                WHEN \'notification_subscription\' THEN SHA2(CONCAT(
                    \'Jazzfreunde\', CHAR(92), \'Api\', CHAR(92), \'Entity\', CHAR(92),
                    \'Notification\', CHAR(92), \'NotificationSubscription\', CHAR(0),
                    LOWER(confirmable.email), CHAR(0), LOWER(subscription.resource_scope)
                ), 256)
            END',
        );
        $this->addSql('ALTER TABLE confirmable_entities MODIFY identity_hash VARCHAR(64) NOT NULL');
        $this->addSql(
            'CREATE UNIQUE INDEX UNIQ_CONFIRMABLE_ENTITY_IDENTITY_HASH ON confirmable_entities (identity_hash)',
        );
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform,
            'Migration can only be executed safely on \'mariadb 10.6\' and higher.',
        );

        $this->addSql(
            'DROP INDEX UNIQ_CONFIRMABLE_ENTITY_IDENTITY_HASH ON confirmable_entities',
        );
        $this->addSql('ALTER TABLE confirmable_entities DROP identity_hash');
    }
}
