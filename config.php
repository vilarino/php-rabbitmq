<?php

use App\Application;
use App\Infra\Mediator\MediatorInterface;
use App\Infra\Repository\PersonRepositoryMemory;
use App\Application\Repository\PersonRepositoryInterface;
use \App\Infra\Mediator\Mediator;

return [
    PersonRepositoryInterface::class => DI\get(PersonRepositoryMemory::class),
    MediatorInterface::class => DI\get(Mediator::class)
];