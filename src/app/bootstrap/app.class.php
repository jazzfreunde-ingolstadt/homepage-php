<?php

namespace Jazzfreunde\App\Bootstrap;

use Jazzfreunde\App\Bootstrap\ComponentLoader;
use Jazzfreunde\Database\Connection;

final class App
{
    private Connection $database_connection;
    private ComponentLoader $component_loader;

    public function __construct()
    {
        $this->component_loader = new ComponentLoader($_SERVER['DOCUMENT_ROOT']);
    }

    public function UseDatabaseContext(Connection $database): void
    {
        $this->database_connection = $database;
    }

    public function DatabaseContext(): Connection
    {
        return $this->database_connection;
    }

    public function ComponentRoot(string $directory): void
    {
        $directory = rtrim($directory, '/\\');

        if (!is_dir($directory))
            throw new \Exception('Supplied path for component root does not exist.');

        $this->component_loader->SetComponentRoot($directory);
    }

    public function include string $filepath: \Closure|array
    {
        $components = $this->component_loader->Load($filepath);
        return $this->component_loader->AddContext($components, $this);
    }
}
