<?php

$app = require __DIR__.'/../../app/startup.php';

if (preg_match('/^\/api\/(.+?)(?:\/)?$/', $_SERVER['REQUEST_URI'], $route) && file_exists(__DIR__."/{$route[1]}.php")) {
    include __DIR__."/{$route[1]}.php";
} else {
    http_response_code(404);
}
