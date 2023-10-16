<?php

namespace App\Application\Handler;

use App\Domain\Event\DomainEventInterface;

interface HandlerInterface
{
    public function handle(DomainEventInterface $event): void;
    public function getName(): string;
}