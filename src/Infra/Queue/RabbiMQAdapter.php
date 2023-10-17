<?php

namespace App\Infra\Queue;

use App\Application\Queue\QueueInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbiMQAdapter implements QueueInterface
{

    public AMQPStreamConnection $connection;

    private function connect()
    {
        $this->connection = new AMQPStreamConnection(
            $_ENV['RABBIT_HOST'],
            $_ENV['RABBIT_PORT'],
            $_ENV['RABBIT_USER'],
            $_ENV['RABBIT_PASSWORD'],
            "/",
            false,
            'AMQPLAIN',
            null,
            'en_US',
            0.3,
            0.3
        );
    }

    public function publish(string $message, string $exchange, string $queue, string $routingKey)
    {
        try {
            $this->connect();

            $channel = $this->connection->channel();
            $message = new AMQPMessage($message, [
                'content_type' => 'application/json',
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]);

            $channel->basic_publish($message, $exchange, $routingKey);

            $channel->close();
            $this->connection->close();
        } catch (\Exception $exc) {
            var_dump($exc->getMessage());
            exit;
        }
    }
}