<?php

namespace Jazzfreunde\Config\Loader;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Config\Exception\FileLoaderImportCircularReferenceException;
use Symfony\Component\Config\Exception\LoaderLoadException;

class FunctionComponentLoader extends FileLoader
{
    public function load($resource, $type = null)
    {
        try {
            $loader = $this->resolve($resource.'.php', $type);
            if ($loader instanceof self) {
                $file = $loader->getLocator()->locate($resource.'.php');

                $files = is_array($file) ? $file : [$file];

                return array_reduce(
                    $files,
                    function (array $components, string $full_path) {
                        $component = require $full_path;

                        return $components[] = $component;
                    },
                    []
                );
            }
        } catch (\Exception $e) {
                // prevent embedded imports from nesting multiple exceptions
            if ($e instanceof LoaderLoadException) {
                throw $e;
            }

                throw new LoaderLoadException($resource, null, 0, $e, $type);
        }
    }

    public function supports($resource, $type = null)
    {
        return is_string($resource) && 'php' === pathinfo(
            $resource,
            PATHINFO_EXTENSION
        ) && str_contains(
            pathinfo(
                $resource,
                PATHINFO_FILENAME
            ),
            'comp'
        );
    }
}
