<?php

$app = require(__DIR__ . '/../app/startup.php');

if (!preg_match('/^\/(.+?)(?:\/)?$/', $_SERVER['REQUEST_URI'], $route))
    include(__DIR__ . "/legacy/pages/index.php");
elseif (file_exists(__DIR__ . "/pages/{$route[1]}.php"))
    include(__DIR__ . "/pages/{$route[1]}.php");
else
    include('pages/404.php');
