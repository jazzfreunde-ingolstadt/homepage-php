<?php
set_include_path(__DIR__);

$ns_mapping = function () {
    yield 'jazzfreunde/database' => 'data/database';
    yield 'jazzfreunde/storage' => 'data/storage';
    yield 'jazzfreunde/environment' => 'environment';
};

spl_autoload_register(
    function ($namespace_class) use ($ns_mapping): void {
        $searchfor = StrToLower(str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $namespace_class));
        $full_path = get_include_path();
        $class = $searchfor;

        foreach ($ns_mapping() as $namespace => $direcotry) {
            if (str_starts_with($searchfor, str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $namespace))) {
                $full_path .= DIRECTORY_SEPARATOR . "{$direcotry}";
                $class = substr($searchfor, strlen($namespace));
                break;
            }
        }

        $full_path = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, "{$full_path}{$class}.php");

        if (file_exists($full_path))
            include_once($full_path);
    }
);



final class AutoloaderException extends \Exception
{
}
