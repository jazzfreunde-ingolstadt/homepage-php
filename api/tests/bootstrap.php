<?php

use Symfony\Component\Dotenv\Dotenv;

require dirname(__DIR__).'/vendor/autoload.php';

if (method_exists(Dotenv::class, 'bootEnv')) {
    (new Dotenv())->overload(
        dirname(__DIR__).'/.env',
        dirname(__DIR__).'/.env.test',
    );
}

passthru(sprintf(
    'APP_ENV=%s php "%s/../bin/console" cache:clear --no-warmup',
    $_ENV['APP_ENV'],
    __DIR__
));
