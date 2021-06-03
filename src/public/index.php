<?php

$ns_mapping = function () {
    yield 'jazzfreunde/database' => 'data/database';
    yield 'jazzfreunde/storage' => 'data/storage';
    yield 'jazzfreunde/environment' => 'environment';
    yield 'jazzfreunde/structures' => 'structures';
    yield 'jazzfreunde/app' => 'app';
};

require(__DIR__ . '/../app/bootstrap/autoload.php');