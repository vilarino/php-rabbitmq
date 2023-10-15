<?php

namespace App\Application\UseCase\CreatePerson;

class Input
{

    public $id;
    public $name;
    public $email;

    public function __construct(string $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
}