<?php

namespace App;

use App\Queue\PersonQueue;

class Application
{
    public function index()
    {
        $queue = new PersonQueue();
        $queue->handler();
    }
}