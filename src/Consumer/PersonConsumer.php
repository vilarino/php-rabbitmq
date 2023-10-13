<?php

namespace App\Consumer;

use PhpAmqpLib\Connection\AMQPStreamConnection;
//use PhpAmqpLib\Exchange\AMQPExchangeType;


class PersonConsumer
{

    public function __construct()
    {
        $exchange = 'exchange';
        $queue = 'personQueue';
        $consumerTag = 'consumer';

        $connection = new AMQPStreamConnection('rabbitmq', '5672', "guest", "guest");
        $channel = $connection->channel();

        //$channel->queue_bind($queue, $exchange);

        $channel->basic_consume($queue, $consumerTag, false, false, false, false, function($message){
            $this->process($message);
        });

        while ($channel->is_open()) {
            $channel->wait();
        }

        register_shutdown_function('shutdown', $channel, $connection);
    }

    public function process($message)
    {
        echo $message->body;
        
        //$message->reject();
        $message->ack();

        if ($message->body === 'quit') {
            $message->getChannel()->basic_cancel($message->getConsumerTag());
        }
    }
}
