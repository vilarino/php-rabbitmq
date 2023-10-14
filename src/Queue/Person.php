<?php

namespace App\Queue;

use App\Queue\JsonableInterface;


class Person implements JsonableInterface
{
    public string $name;
    public string $id;
    public int $age;
    
    public function __construct(string $id, string $name, int $age)
    {
      $this->id = $id;
      $this->name = $name;
      $this->age = $age;
    }

    public function json()
    {
        return json_encode([
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age
        ]);
    }
}
