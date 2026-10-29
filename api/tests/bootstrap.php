<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

(new Dotenv())->overload(
    dirname(__DIR__).'/.env',
    dirname(__DIR__).'/.env.test',
);

$appEnv = $_ENV['APP_ENV'] ?? null;
if (!is_string($appEnv)) {
    throw new RuntimeException('APP_ENV must be defined as a string.');
}

passthru(sprintf(
    'APP_ENV=%s php "%s/../bin/console" cache:clear --no-warmup',
    $appEnv,
    __DIR__
));
