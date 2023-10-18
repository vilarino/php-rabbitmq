# PHP - Rabbit

Esse projeto tem como objetivo servir de exemplo para utilização de algumas tecnologias tais como:
* Docker
* RabbitMQ
* Xdebug

## Estrutura
```bash
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