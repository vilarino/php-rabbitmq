<?php

namespace App;

use App\Application\UseCase\CreatePerson\CreatePerson;
use App\Application\UseCase\CreatePerson\Input;
use App\Domain\Entity\Person;
use App\Queue\PersonQueue;
use DI\Container;
use Ramsey\Uuid\Uuid;

class Application
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function index()
    {
        $output = $this->container->get(CreatePerson::class)
        ->execute(new Input(Uuid::uuid4()->toString(), "Rafael", "rovilarino@gmail.com"));

        var_dump('output', $output);
    }
}