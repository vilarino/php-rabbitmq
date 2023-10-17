<?php

namespace App\Application\UseCase\CreatePerson;

use App\Application\Handler\SendWelcomeMailHandler;
use App\Application\Repository\PersonRepositoryInterface;
use App\Domain\Entity\Person;
use App\Domain\Event\PersonCreatedEvent;
use App\Infra\Mediator\MediatorInterface;
use DI\Container;

class CreatePerson
{
    private PersonRepositoryInterface $personRepository;
    private MediatorInterface $mediator;

    public function __construct(PersonRepositoryInterface $personRepository, MediatorInterface $mediator, Container $container)
    {
        $this->personRepository = $personRepository;
        $this->mediator = $mediator;
        $this->mediator->register($container->get(SendWelcomeMailHandler::class));
    }

    public function execute(Input $input)
    {
        $person = new Person($input->id, $input->name, $input->email);
        $this->personRepository->save($person);

        $event = new PersonCreatedEvent($person->name, $person->email);
        $this->mediator->publish($event);
    }
}