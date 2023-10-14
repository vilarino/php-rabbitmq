<?php

namespace App;

use App\Queue\PersonQueue;
use App\Queue\Person;
use Ramsey\Uuid\Uuid;

class Application
{
    public function index()
    {
        $person = new Person(Uuid::uuid4()->toString(), "Rafael", 33);

        $queue = new PersonQueue();
        $queue->handler($person);
    }
}