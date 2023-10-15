<?php

namespace App\Infra\Repository;

use App\Application\Repository\PersonRepositoryInterface;
use App\Domain\Entity\Person;

final class PersonRepositoryMemory implements PersonRepositoryInterface
{
    private array $people = [];
    public function save(Person $person): void
    {
        $this->people[] = $person;
    }

}