<?php

use Jazzfreunde\App\Bootstrap\App;
use Jazzfreunde\Database;

$ns_mapping = function () {
    yield 'jazzfreunde/database' => 'data/database';
    yield 'jazzfreunde/storage' => 'data/storage';
    yield 'jazzfreunde/environment' => 'environment';
    yield 'jazzfreunde/structures' => 'structures';
    yield 'jazzfreunde/app' => 'app';
};

set_include_path(realpath(__DIR__ . '/../../'));

require(get_include_path() . '/app/bootstrap/autoload.php');

$app = new App();
$app->UseDatabaseContext(
    new Database\Connection(
        new Database\Credentials(
            getenv('DATABASE_HOST'),
            getenv('DATABASE_DATABASE'),
            getenv('DATABASE_USER'),
            getenv('DATABASE_PASSWORD')
        )
    )
);

return $app;