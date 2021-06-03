<?php

require(__DIR__ . '/../app/bootstrap/autoload.php');

if (file_exists(__DIR__ . "/pages{$_SERVER['REQUEST_URI']}.php"))
    include(__DIR__ . "/pages{$_SERVER['REQUEST_URI']}.php");
else
    include('pages/404.php');
