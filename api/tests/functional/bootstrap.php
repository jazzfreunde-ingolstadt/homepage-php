<?php

use Symfony\Component\Dotenv\Dotenv;

/*
 * Bootstrap file for functional tests. Loads environment variables from the .env.test.functional file.
 * This bootstrap is designed to work in tandem with the default bootstrap file.
 */

(new Dotenv())->overload(
    dirname(__DIR__, 2).'/.env.test.functional',
);
