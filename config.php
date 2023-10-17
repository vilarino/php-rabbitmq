<?php

use App\Application\Queue\QueueInterface;
use App\Infra\Mediator\MediatorInterface;
use App\Infra\Repository\PersonRepositoryMemory;
use App\Application\Repository\PersonRepositoryInterface;
use App\Infra\Mediator\Mediator;
use App\Infra\Queue\RabbiMQAdapter;

return [
    PersonRepositoryInterface::class => DI\get(PersonRepositoryMemory::class),
    MediatorInterface::class => DI\get(Mediator::class),
    QueueInterface::class => DI\get(RabbiMQAdapter::class)
];