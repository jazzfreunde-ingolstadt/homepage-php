# General Guidelines

When writing code follow these general guidelines to ensure readability, maintainability, and overall quality.

## Guidelines for completing a Task

Run PHP-CS-Fixer and PHPStan against the changed PHP files or their containing directory before completing a task. Pass file or directory paths as positional arguments to avoid scanning unrelated code and wasting agent/API resources. Use project-wide checks only for broad changes or when explicitly requested.

## Tools
This section provides an overview of the tools and practices used in this project to ensure code quality and maintainability.

### Linting Code
This project uses [PHPCS Fixer](https://github.com/php-cs-fixer/php-cs-fixer) to automatically format and lint PHP code according to the defined coding standards.

Available commands for PHPCS Fixer can be found with 
```bash
bin/php-cs-fixer list
```
Run PHP-CS-Fixer on only the changed files (or their containing directory) to automatically format and lint them according to the defined coding standards:
```bash
bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php src/Path/ChangedFile.php
```

Multiple files can be listed, or a directory can be supplied instead:
```bash
bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php src/Path/One.php src/Path/Two.php
bin/php-cs-fixer fix --config=.php-cs-fixer.dist.php src/Path/ChangedDirectory
```

### Static Code Analysis

Static code analysis helps identify potential issues in your code without executing it. This project uses [PHPStan](https://phpstan.org/) at maximum strictness, without a baseline.

Available commands for PHPStan can be found with
```bash
bin/phpstan analyse --help
```
Warm the development container after installing dependencies or changing service configuration:
```bash
APP_ENV=dev bin/console cache:warmup
```

Run PHPStan on only the changed files (or their containing directory):

```bash
bin/phpstan analyse src/Path/ChangedFile.php
```

Multiple files and directories can be supplied as positional arguments. Run `bin/phpstan analyse` without paths only when a project-wide scan is warranted. Fix findings rather than suppressing them or adding baseline entries.

### Testing Code

This project uses [PHPUnit](https://github.com/sebastianbergmann/phpunit) for testing PHP code.

Available commands for PHPUnit can be found with 
```bash
./vendor/bin/phpunit --help
```
Always run `./vendor/bin/phpunit` to execute the test suite and ensure your code behaves as expected. Only run the tests relevant to the changes you have made to save time and resources.

The folder `tests` contains all the test cases for this project. The folder structure must mirror the `src` folder structure.

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