<?php

namespace App\Application\Repository;

 use App\Domain\Entity\Person;

 interface PersonRepositoryInterface
{
    public function save(Person $person): void;

}