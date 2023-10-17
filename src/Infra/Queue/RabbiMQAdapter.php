<?php

namespace App\Infra\Queue;

use App\Application\Queue\QueueInterface;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Exchange\AMQPExchangeType;
use PhpAmqpLib\Message\AMQPMessage;

class RabbiMQAdapter implements QueueInterface
{
    private string $exchange;

    public function __construct()
    {
        $this->exchange = env("RABBIT_EXCHANGE");
    }

    public AMQPStreamConnection $connection;

    private function connect()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBIT_HOST'),
            env('RABBIT_PORT'),
            env('RABBIT_USER'),
            env('RABBIT_PASSWORD'),
            "/",
            false,
            'AMQPLAIN',
            null,
            'en_US',
            0.3,
            0.3
        );
    }

    public function publish(string $message, string $queue, string $routingKey)
    {
        try {
            $this->connect();

            $channel = $this->connection->channel();

            $this->createExchangeIfNotExist($channel);
            $this->createQueueIfNotExist($channel, $queue, $routingKey);

            $message = new AMQPMessage($message, [
                'content_type' => 'application/json',
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]);

            $channel->basic_publish($message, $this->exchange, $routingKey);

            $channel->close();
            $this->connection->close();
        } catch (\Exception $exc) {
            var_dump($exc->getMessage());
            exit;
        }
    }

    private function createExchangeIfNotExist(AMQPChannel $chanel)
    {
        try {
            $chanel->exchange_declare($this->exchange, AMQPExchangeType::TOPIC, false, true, false);
        } catch (\Exception $exception) {
            var_dump($exception->getMessage());
        }
    }

    private function createQueueIfNotExist(AMQPChannel $channel, string $queue, string $routingKey)
    {
        try {
            $channel->queue_declare($queue, false, true, false, false);
            $channel->queue_bind($queue, $this->exchange, $routingKey);
        } catch (\Exception $exception) {
            var_dump($exception);
        }
    }
}