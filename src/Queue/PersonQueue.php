<?php

namespace App\Queue;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Exchange\AMQPExchangeType;

class PersonQueue
{
    public AMQPStreamConnection $connection;

    // Todo: Remover configurações do arquivo
    public function handler(JsonableInterface $person)
    {
        try {

            $this->initConnection();
            //var_dump('asfdsda'); exit;
            ;
            //            var_dump($connection); exit;
            // Cria um canal (channel)
            $channel = $this->connection->channel();

            //$queueName = "personQueue";
            $exchange = "person_exchange";
            // Declara uma fila (queue) para onde a mensagem será enviada
            // $channel->queue_declare($queueName, false, true, false, false);

            //$channel->queue_bind($queueName, $exchange);
            //$channel->exchange_declare($exchange, AMQPExchangeType::TOPIC, false, true, false);

            // Mensagem que será enviada
            //$messageBody = 'Olá, RabbitMQ!';
            error_log(json_encode($_REQUEST));
            // Cria uma instância de AMQPMessage com a mensagem
            $message = new AMQPMessage($person->json(), [
                'content_type' => 'text/plain',
                'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT
            ]);

            // Publica (envia) a mensagem para a fila
            $channel->basic_publish($message, $exchange, "person");

            echo "Mensagem enviada: {$person->json()}\n";

            // Fecha o canal e a conexão
            $channel->close();
            $this->connection->close();
        } catch (\Exception $exc) {
            var_dump($exc->getMessage());
            exit; //$exc->getMessage(),
        }
    }

    public function initConnection()
    {
        $this->connection = new AMQPStreamConnection(
            'rabbitmq',
            '5672',
            "guest",
            "guest",
            "/",
            false,
            'AMQPLAIN',
            null,
            'en_US',
            0.3,
            0.3
        );
    }
}
