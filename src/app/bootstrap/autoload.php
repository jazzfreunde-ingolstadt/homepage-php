<?php

global $ns_mapping;

spl_autoload_register(
    function ($namespace_class): void {
        $searchfor = StrToLower(str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $namespace_class));
        $full_path = get_include_path();
        $class = $searchfor;

        if (isset($GLOBALS['ns_mapping'])) {
            foreach ($GLOBALS['ns_mapping']() as $namespace => $direcotry) {
                if (str_starts_with($searchfor, str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $namespace))) {
                    $full_path .= DIRECTORY_SEPARATOR . "{$direcotry}";
                    $class = substr($searchfor, strlen($namespace));
                    break;
                }
            }
        }
        $full_path = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, "{$full_path}/{$class}.php");

        if (!file_exists($full_path))
            throw new AutoloaderException("Unable to locate include path for requestet class \\{$namespace_class}. Expected in {$full_path}");

        include_once($full_path);
    }
);



final class AutoloaderException extends \Exception
{
}
