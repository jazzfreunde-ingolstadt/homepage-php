<?php

namespace Jazzfreunde\App\Bootstrap;

use Closure;
use Jazzfreunde\App\Bootstrap\App;

final class ComponentLoader
{
    private string $component_root;

    public function __construct(string $component_root)
    {
        $this->SetComponentRoot($component_root);
    }

    public function SetComponentRoot(string $component_root)
    {
        $this->component_root = $component_root;
    }

    public function Load(string $path): Closure|array
    {
        return $this->get_components_from_file($path);
    }

    public function AddContext(Closure|array $components, App &$app): Closure|array
    {
        if (is_array($components))
            foreach ($components as $closure)
                $this->setScope($closure, $app);
        else
            $this->setScope($components, $app);

        return $components;
    }

    private function setScope(Closure &$component, App &$app): void
    {
        $component = $component->bindTo(new \Jazzfreunde\Structures\Templating\ComponentContext($app));
    }

    private function get_components_from_file(string $path): Closure|array
    {
        if (empty($path))
            throw new ComponentLoaderException('Component path cannot be empty.');

        $absolute_path = '/' === substr($path, 0, 1);
        $root = $absolute_path ? $_SERVER['DOCUMENT_ROOT'] : $this->component_root;

        $fullpath = $root . DIRECTORY_SEPARATOR . ltrim($path) . '.php';

        if (!file_exists($fullpath))
            throw new ComponentLoaderException("File not found (${fullpath}).");

        return include $fullpath;
    }
}


final class ComponentLoaderException extends \Exception
{
}
