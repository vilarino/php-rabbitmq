<?php

namespace App\Application\Handler;

use App\Application\Queue\QueueInterface;
use App\Domain\Event\DomainEventInterface;
use App\Domain\Event\PersonCreatedEvent;
use function DI\env;
use function DI\string;

class SendWelcomeMailHandler implements HandlerInterface
{
    private QueueInterface $queue;

    public function __construct(QueueInterface $queue)
    {
        $this->queue = $queue;
    }

    public function getName(): string
    {
        return "PersonCreated";
    }

    public function handle(DomainEventInterface $event): void
    {
        /**
         * @var $event PersonCreatedEvent
         */
        $body = "Bem vindo(a) {$event->personName}. Logo receberá mais atualizações sobre sua conta.";

        $this->queue->publish(
            json_encode(['recipient' => $event->personEmail, 'body' => $body]),
            $_ENV["RABBIT_MAIL_EXCHANGE"],
            $_ENV["RABBIT_MAIL_QUEUE"],
            $_ENV["RABBIT_MAIL_ROUTING_KEY"]
        );
    }
}