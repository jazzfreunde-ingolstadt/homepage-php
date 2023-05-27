<?php

use Jazzfreunde\App\Kernel;

if (\file_exists(__DIR__.'/maintenance.htm')) {
    http_response_code(503);
    exit('Diese Seite befindet sich aktuell in Wartung. Bitte versuchen Sie es zu einem späteren Zeitpunkt erneut.');
}

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel((string) $context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
