<?php

namespace App\Queue;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Exchange\AMQPExchangeType;

class PersonQueue
{
    // Todo: Remover configurações do arquivo
    public function handler()
    {
        try {
            $connection = new AMQPStreamConnection('rabbitmq', '5672', "guest", "guest");

//            var_dump($connection); exit;
            // Cria um canal (channel)
            $channel = $connection->channel();

            $queueName = "personQueue";
            $personEx = "personEx";
            // Declara uma fila (queue) para onde a mensagem será enviada
            $channel->queue_declare($queueName, false, true, false, false);

           // $channel->exchange_declare($personEx, AMQPExchangeType::DIRECT, false, true, false);
            
            ///$channel->queue_bind($queueName, $personEx);


            // Mensagem que será enviada
            $messageBody = 'Olá, RabbitMQ!';

            // Cria uma instância de AMQPMessage com a mensagem
            $message = new AMQPMessage($messageBody);

            // Publica (envia) a mensagem para a fila
            $channel->basic_publish($message, '', $queueName);

            echo "Mensagem enviada: '$messageBody'\n";

            // Fecha o canal e a conexão
            $channel->close();
            $connection->close();
        } catch (\Exception $exc) {
            var_dump($exc->getMessage()); exit; //$exc->getMessage(), 
        }
    }
}
