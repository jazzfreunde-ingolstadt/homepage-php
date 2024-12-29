# Homepage der Jazzfreunde Ingolstadt e.V.
[![Code Health](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/lint-sourcecode.yml/badge.svg)](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/lint-sourcecode.yml) [![Deploy Now: Deploy to IONOS](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/deploy-to-ionos.yaml/badge.svg)](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/deploy-to-ionos.yaml) [![Deploy Now: Orchestration](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/homepage-php-orchestration.yaml/badge.svg)](https://github.com/jazzfreunde-ingolstadt/homepage-php/actions/workflows/homepage-php-orchestration.yaml)

Offizielle Website der Jazzfreunde Ingolstadt.

## Getting Started

> [!IMPORTANT]  
> Sollten manche der PHP-Skripte aufgrund fehlender Berechtigung nicht ausführbar sein, vergebe die Berechtigung zum ausführen von Skripten neu für alle Executables im 'bin' Verzeichnis.
>
> `root:/usr/project# chmod -R +x src/bin`

### Installiere PHP Abhängigkeiten

Für das Installieren der Composer Abhängigkeiten steht der VS Code Task 'composer install' bereit.

### Setup Datenbank

Die Datenbank muss initial befüllt werden. Dieser Vorgang setzt sich aus einem Basisskript und folgenden Datenbankmigrationen zusammen.

1. Basisskript importieren
Führe letzten SQL Export `.docker/database/export_*.sql` aus.
Dafür kann die Weboberfläche [phpMyAdmin](http://localhost:81) verwendet werden, die als lokaler Container zur Verfügung steht.

2. Migrationen ausführen

Für das Ausführen der Datenbankmigrationen steht der VS Code Task 'Run Unit Tests' bereit.

[siehe: Symfony - DoctrineMigrationsBundle](https://symfony.com/bundles/DoctrineMigrationsBundle/current/index.html)

### Run Unit Tests

Um die Integrität des Backends sichrzustellen, werden alle wichtigen Backend-Funktionalitäten durch Unit Tests abgesichert \([siehe: PHPUnit](https://phpunit.de/index.html)\).

Für das Ausführen der PHPUnit Unit Tests steht der VS Code Task 'Run Unit Tests' bereit.
