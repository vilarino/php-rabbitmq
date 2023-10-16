<?php

namespace App\Application\Handler;

use App\Domain\Event\DomainEventInterface;
use App\Domain\Event\PersonCreatedEvent;

class SendMailHandler implements HandlerInterface
{
    public function getName(): string
    {
        return "PersonCreated";
    }

    public function handle(DomainEventInterface $event): void
    {
        /**
         * @var $event PersonCreatedEvent
         */
        var_dump($event->personName, $event->personEmail);
    }
}