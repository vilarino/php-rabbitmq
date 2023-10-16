<?php

namespace App\Infra\Mediator;

use App\Application\Handler\HandlerInterface;
use App\Domain\Event\DomainEventInterface;

class Mediator implements MediatorInterface
{
    private $handlers;

    public function __construct()
    {
        $this->handlers = [];
    }

    public function register(HandlerInterface $handler): void
    {
        $this->handlers[] = $handler;
    }

    public function publish(DomainEventInterface $event): void
    {
        foreach ($this->handlers as $handler) {
            if ($handler->getName() == $event->getEventName()) {
                $handler->handle($event);
            }
        }
    }
}