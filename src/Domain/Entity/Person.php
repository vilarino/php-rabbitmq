<?php

namespace App\Domain\Entity;

use App\Queue\JsonableInterface;


class Person
{
    public string $name;
    public string $id;
    public string $email;
    
    public function __construct(string $id, string $name, string $email)
    {
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
    }

}
