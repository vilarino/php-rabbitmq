# PHP - Rabbit

Esse projeto tem como objetivo servir de exemplo para utilização de algumas tecnologias tais como:
* Docker
* RabbitMQ
* Xdebug

## Estrutura
```
    |-- 📂 php-rabbitmq
        |-- 📂 docker
        |-- 📂 src
        |   |-- 📂 Application
        |   |   |-- 📂 Handler 
        |   |   |   |-- HandlerInterface.php
        |   |   |   |-- SendWelcomeMailHandler.php
        |   |   |-- 📂 Queue
        |   |   |   |--  QueueInterface
        |   |   |   📂 Repository
        |   |   |   |-- PersonRepositoryInterface.php
        |   |   |   📂 UseCase
        |   |   |   |-- 📂 CreatePerson
        |   |   |   |   |-- CreatePerson.php
        |   |   |   |   |-- Input.php
        |   |   📂 Domain
        |   |   |-- 📂 Entity
        |   |   |   |-- Person.php
        |   |   |   📂 Event
        |   |   |   |-- DomainEventInterface.php
        |   |   |   |-- PersonCreatedEvent.php
        |   |-- 📂 Infra
        |   |   |-- 📂 Logger
        |   |   |   |-- AbstractLogger.php
        |   |   |   |-- LoggerAwareInterface.php
        |   |   |   |-- LoggerAwareTrait.php
        |   |   |   |-- LoggerInterface.php
        |   |   |   |-- LoggerTrait.php
        |   |   |   |-- LogLevel.php
        |   |   |   |-- NullLogger.php
        |   |   |-- 📂 Mediator
        |   |   |   |-- MediatorInterface.php
        |   |   |   |-- Mediator.php
        |   |   |   📂 Queue
        |   |   |   |-- RabbitMQAdapter.php
        |   |   |   📂 Repository
        |   |   |   |-- PersonRepository.php
        |   |-- Application.php 
        |   |-- helpers.php 
```