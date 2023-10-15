<?php

namespace App\Domain\Entity;

use App\Queue\JsonableInterface;


class Person implements JsonableInterface
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

    public function json()
    {
        return json_encode([
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->email
        ]);
    }
}
