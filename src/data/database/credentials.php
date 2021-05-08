<?php

namespace Jazzfreunde\Database;

class Credentials
{
    public function __construct(
        public string $host, 
        public string $database, 
        public string $user,
        public string $password
    ) {}
}