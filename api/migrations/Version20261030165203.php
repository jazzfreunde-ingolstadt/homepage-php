<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MariaDB1060Platform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Keeps existing confirmation contracts usable after the application namespace rename.
 */
final class Version20261030165203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename stored confirmable entity classes from Jazzfreunde\App to Jazzfreunde\Api';
    }

    public function up(Schema $schema): void
    {
        $this->renameEntityClasses('Jazzfreunde\App\Entity\\', 'Jazzfreunde\Api\Entity\\');
    }

    public function down(Schema $schema): void
    {
        $this->renameEntityClasses('Jazzfreunde\Api\Entity\\', 'Jazzfreunde\App\Entity\\');
    }

    private function renameEntityClasses(string $oldNamespace, string $newNamespace): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MariaDB1060Platform, 'Migration can only be executed safely on \'mariadb 10.6\' and higher.');

        foreach (['NewsletterSubscription', 'Notification\NotificationSubscription'] as $entity) {
            $this->addSql(
                "UPDATE confirmation_contracts SET metadata = JSON_SET(metadata, '$.confirmableEntityClass', :newClass) WHERE JSON_UNQUOTE(JSON_EXTRACT(metadata, '$.confirmableEntityClass')) = :oldClass",
                [
                    'oldClass' => $oldNamespace.$entity,
                    'newClass' => $newNamespace.$entity,
                ],
            );
        }
    }
}
