<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class UserDTO extends Data
{
    public function __construct(
        public string $nome,
        public string $email,
        public string $password
    )
    {}
}
