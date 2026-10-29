# About this project

## Getting Started

> [!IMPORTANT]
> If some PHP scripts cannot be executed due to missing permissions, reapply executable permissions to all executables in the `bin` directory.
>
> `root:/usr/project# chmod -R +x api/bin`

### Install PHP Dependencies

The VS Code task `composer install` is available to install the Composer dependencies.

### Set Up the Database

The database must be populated initially. This process consists of a base script followed by the database migrations.

1. Import the base script:
  Run the latest SQL export `.docker/database/export_*.sql`.
  You can use the [phpMyAdmin](http://localhost:81) web interface, which is available as a local container.

2. Run the migrations:
  The VS Code task `Run Unit Tests` is available to run the database migrations.

[siehe: Symfony - DoctrineMigrationsBundle](https://symfony.com/bundles/DoctrineMigrationsBundle/current/index.html)

### Run Unit Tests

To ensure the integrity of the backend, all important backend functionality is covered by unit tests \([see: PHPUnit](https://phpunit.de/index.html)\).

The VS Code task `Run Unit Tests` is available to run the PHPUnit unit tests.

### Build Frontend

The frontend uses Symfony's [Twig](https://twig.symfony.com/) by default.
[Webpack Encore](https://symfony.com/doc/current/frontend/encore/index.html) is used for client-side logic, allowing JavaScript-based components to be embedded in templates.
Together with [Symfony UX](https://ux.symfony.com/) and [Symfony UX React](https://symfony.com/bundles/ux-react/current/index.html), this enables React components to be integrated as micro frontends.

To compile the Encore components, run the VS Code task `build encore`.

## Development Workflow

### Symfony Console

Many development tools are run through the Symfony Console component.
See the [Symfony Console documentation](https://symfony.com/doc/current/console.html).
Some of the most important Symfony Console commands are:

Messenger [(Documentation)](https://symfony.com/doc/current/messenger.html#consuming-messages-running-the-worker)
  Consume messages, for example, to send emails.
  ```bash
    bin/console messenger:consume async --time-limit=15
  ```
Doctrine Migrations [(Documentation)](https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html)
  Run migrations.
  ```bash
      bin/console doctrine:migrations:migrate
      bin/console doctrine:migrations:diff
  ```

### Local Development Server

The website is available locally at [http://localhost/](http://localhost/).
If the frontend has not yet been compiled, compile it before opening the site. This also applies to the email templates.
Use the `npm run app:server` script to develop the interface.

### Static Code Analysis

The project uses [PHPStan](https://phpstan.org/) at maximum strictness, with Symfony, Doctrine, and PHPUnit extensions.
PHP 8.4 property hooks are supported, including type checking inside getters and setters.
Application code, libraries, and tests are analysed. There is no baseline for existing findings.

Run the VS Code task `Static Code Analysis` (which warms the development container first), or:

```sh
APP_ENV=dev bin/console cache:warmup
bin/phpstan analyse
```

For focused analysis, pass files or directories after `analyse`, for example `bin/phpstan analyse src/Service`.
Warm the container again after changing service configuration. Analysis uses Doctrine metadata without connecting to the database.

### Twig Template Linting

Run the VS Code task `Lint Twig templates` or:

```bash
bin/console lint:twig --excludes=zurb_2
```

This validates the project and dependency templates except Symfony's unused Zurb email templates, which require the optional `twig/inky-extra` package. Inky is disabled in this project and does not need to be installed.

### Local Email Server

All outgoing email is intercepted by a local SMTP server. You can inspect all email traffic at http://localhost:82.

## API Documentation

API Operations are handled through the [API Platfrom](https://api-platform.com/).

### Swagger UI

You can access the Swagger UI for the API at the following URL:

```
http://localhost/api/index.html
```