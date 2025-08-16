# Homepage der Jazzfreunde Ingolstadt e.V.

[![Code Health](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/lint-sourcecode.yml/badge.svg)](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/lint-sourcecode.yml) [![Unit Tests](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/run-unittests.yml/badge.svg)](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/run-unittests.yml) [![Deploy Now: Deploy to IONOS](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/deploy-to-ionos.yaml/badge.svg)](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/deploy-to-ionos.yaml) [![Deploy Now: Orchestration](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/homepage-php-orchestration.yaml/badge.svg)](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/homepage-php-orchestration.yaml)

Offizielle Website der Jazzfreunde Ingolstadt.

## Getting Started

> [!IMPORTANT]  
> Sollten manche der PHP-Skripte aufgrund fehlender Berechtigung nicht ausführbar sein, vergebe die Berechtigung zum ausführen von Skripten neu für alle Executables im 'bin' Verzeichnis.
>
> `root:/usr/project# chmod -R +x api/bin`

### Installiere PHP Abhängigkeiten

Für das Installieren der Composer Abhängigkeiten steht der VS Code Task 'composer install' bereit.

### Setup Datenbank

Die Datenbank muss initial befüllt werden. Dieser Vorgang setzt sich aus einem Basisskript und folgenden Datenbankmigrationen zusammen.

1. Basisskript importieren:
   Führe letzten SQL Export `.docker/database/export_*.sql` aus.
   Dafür kann die Weboberfläche [phpMyAdmin](http://localhost:81) verwendet werden, die als lokaler Container zur Verfügung steht.

2. Migrationen ausführen:
   Für das Ausführen der Datenbankmigrationen steht der VS Code Task 'Run Unit Tests' bereit.

[siehe: Symfony - DoctrineMigrationsBundle](https://symfony.com/bundles/DoctrineMigrationsBundle/current/index.html)

### Run Unit Tests

Um die Integrität des Backends sichrzustellen, werden alle wichtigen Backend-Funktionalitäten durch Unit Tests abgesichert \([siehe: PHPUnit](https://phpunit.de/index.html)\).

Für das Ausführen der PHPUnit Unit Tests steht der VS Code Task 'Run Unit Tests' bereit.

### Build Frontend

Das Frontend verwendet standardmäßig Symfonys [Twig](https://twig.symfony.com/).
Für client-seitige Logik wird jedoch auf [Webpack Encore](https://symfony.com/doc/current/frontend/encore/index.html) zurückgegriffen.
Folgendes erlaubt es Javascript basierte Komponenten in Templates einzubinden.
Zusammen mit [Symfony UX](https://ux.symfony.com/) und [Symfony UX React](https://symfony.com/bundles/ux-react/current/index.html) werden so React Komponenten als Micro Frontends eingeschleust.

Um die Encore Komponenten zu kompilieren, muss der VS Code Task 'build encore' ausgeführt werden.

## Entwicklungsprozess

### Symfony Console

Über die Konsolenkomponente von Symfony werden viele Tools im Entwicklungsprozress ausgeführt.
Siehe [](https://symfony.com/doc/current/console.html)
Einige der wichtigsten Symfony Console Befehle sind:

- Messenger [(Documentation)](https://symfony.com/doc/current/messenger.html#consuming-messages-running-the-worker)
  Nachrichten konsumieren, um beispielsweise Emails zu versenden.
  ```bash
    bin/console messenger:consume async --time-limit=15
  ```
- Doctrine Migrations [(Documentation)](https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html)
  Migrationen ausführen.
  ```bash
      bin/console doctrine:migrations:migrate
      bin/console doctrine:migrations:diff
  ```

### Lokaler Entwicklungs-Server

Die Webseite ist lokal immer unter [](http://localhost/) erreichbar.
Sollte das Frontend noch nicht kompiliert worden sein, muss dies vor dem Aufruf nachgeholt werden. Dies betrifft auch die Email Templates.
Zum Entwickeln der Oberfläche steht das Skript `npm run app:server` zur Verfügung.

### Statische Code-Analyze

Um sicherzustellen, dass der PHP-Code keine Fehler enthällt, verwendet das Projekt [Psalm]a(https://psalm.dev/).
Abrufbar über den VS Code Task 'Analyze code'.

### Lokaler Email-Server

Alle ausgehenden Email werden über einen lokalen SMTP-Server abgefangen. Sämtlicher Email-Verkehr kann über http://localhost:82 verfolgt werden.
