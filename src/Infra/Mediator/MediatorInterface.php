<?php

namespace App\Infra\Mediator;

use App\Application\Handler\HandlerInterface;
use App\Domain\Event\DomainEventInterface;

interface MediatorInterface
{
    public function register(HandlerInterface $handler): void;
    public function publish(DomainEventInterface $event): void;
}