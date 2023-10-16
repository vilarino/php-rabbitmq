<?php

namespace App\Domain\Event;

class PersonCreatedEvent implements DomainEventInterface
{
    public string $personName;
    public string $personEmail;

    public function getEventName(): string
    {
        return "PersonCreated";
    }

    public function __construct(string $name, string $email)
    {
        $this->personName = $name;
        $this->personEmail = $email;
    }
}