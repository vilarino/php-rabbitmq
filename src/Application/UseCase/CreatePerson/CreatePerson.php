<?php

namespace App\Application\UseCase\CreatePerson;

use App\Application\Repository\PersonRepositoryInterface;
use App\Domain\Entity\Person;

class CreatePerson
{
    private PersonRepositoryInterface $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function execute(Input $input)
    {
        $person = new Person($input->id, $input->name, $input->email);
        $this->personRepository->save($person);

        return new Output($person->id, $person->name, $person->email);
    }
}