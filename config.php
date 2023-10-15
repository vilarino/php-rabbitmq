<?php

use App\Application;
use App\Infra\Repository\PersonRepositoryMemory;
use App\Application\Repository\PersonRepositoryInterface;

return [
    PersonRepositoryInterface::class => DI\get(PersonRepositoryMemory::class)
];