<?php

namespace Jazzfreunde\Database;

abstract class DTO
{
    public function Values(): array
    {
        $attributes = get_object_vars($this);
        $bind_param_names = array_map(fn (string $key) => ":${key}", array_keys($attributes));

        return array_combine($bind_param_names, $attributes);
    }

    public function Fieldnames(): array
    {
        $attributes = get_object_vars($this);

        return array_keys($attributes);
    }

    public function BindParamNames(): array
    {
        $fieldnames = array_keys(get_object_vars($this));
        $bind_param_names = array_map(fn (string $key) => ":${key}", $fieldnames);

        return array_combine($fieldnames, $bind_param_names);
    }
}
