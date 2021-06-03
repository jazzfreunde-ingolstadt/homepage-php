<?php

namespace Jazzfreunde\Database;

class Credentials
{
    public function __construct(
        public string $host,
        public string $database,
        public string $user,
        public string $password
    ) {
    }

    public static function LoadFromEnv(
        string $host_env,
        string $database_env,
        string $user_env,
        string $password_env
    ): Credentials {

        return new Credentials(
            @$_ENV[$host_env] ?? '',
            @$_ENV[$database_env] ?? '',
            @$_ENV[$user_env] ?? '',
            @$_ENV[$password_env] ?? ''
        );
    }

    public function __debugInfo()
    {
        return [
            'host' => '********',
            'database' => $this->database,
            'user' => '********',
            'password' => '********'
        ];
    }

    public function __toString()
    {
        return $this->database;
    }
}
