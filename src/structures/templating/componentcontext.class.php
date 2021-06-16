<?php

namespace Jazzfreunde\Structures\Templating;

use Jazzfreunde\App\Bootstrap\App;
use Jazzfreunde\Database\Connection;

final class ComponentContext
{
    public function __construct(private App &$app)
    {
    }

    public function DatabaseContext(): Connection
    {
        return $this->app->DatabaseContext();
    }
}
