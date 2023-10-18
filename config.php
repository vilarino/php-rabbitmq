<?php

use App\Application\Queue\QueueInterface;
use App\Infra\Queue\RabbiMQAdapter;
use App\Infra\Mediator\MediatorInterface;
use App\Infra\Mediator\Mediator;
use App\Infra\Repository\PersonRepositoryMemory;
use App\Application\Repository\PersonRepositoryInterface;
use App\Infra\Logger\LoggerInterface;
use App\Infra\Logger\NullLogger;

return [
    PersonRepositoryInterface::class => DI\get(PersonRepositoryMemory::class),
    MediatorInterface::class => DI\get(Mediator::class),
    QueueInterface::class => DI\get(RabbiMQAdapter::class),
    LoggerInterface::class => DI\get(NullLogger::class)
];