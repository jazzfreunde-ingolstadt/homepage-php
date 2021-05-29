<?php

use Jazzfreunde\App\Bootstrap\App;
use Jazzfreunde\Database;
use Jazzfreunde\App\Models;

$ns_mapping = function () {
    yield 'jazzfreunde/database' => 'data/database';
    yield 'jazzfreunde/storage' => 'data/storage';
    yield 'jazzfreunde/environment' => 'environment';
    yield 'jazzfreunde/structures' => 'structures';
    yield 'jazzfreunde/app' => 'app';
};

set_include_path(realpath(__DIR__ . '/../../'));

require(get_include_path() . '/vendor/autoload.php');
require(get_include_path() . '/app/bootstrap/autoload.php');

$dotenv = new Symfony\Component\Dotenv\Dotenv();
$dotenv->load(get_include_path() . '/../.env');

$app = new App();
$app->UseDatabaseContext(
    new Database\Connection(
        Database\Credentials::LoadFromEnv(
            'DATABASE_HOST',
            'DATABASE_NAME',
            'DATABASE_USER',
            'DATABASE_PASSWORD'
        )
    )
);

$registered_models = function (): \Generator {
    yield from Models\TermineModel::TasksToRun();
};
$database_migration = new Database\Migration($registered_models());
$database_migration->Update($app->DatabaseContext());

return $app;
