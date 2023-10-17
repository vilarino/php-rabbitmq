<?php

namespace App\Application\Queue;

interface QueueInterface
{
    public function publish(string $message, string $queue, string $routingKey);
}