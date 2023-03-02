<?php

namespace App\Modules\Messaging\Infrastructure;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqService
{
    protected $connection;
    protected $channel;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection(
            env('RABBITMQ_HOST'),
            env('RABBITMQ_PORT'),
            env('RABBITMQ_VHOST'),
            env('RABBITMQ_LOGIN'),
            env('RABBITMQ_PASSWORD')
        );
        $this->channel = $this->connection->channel();
    }

    public function __destruct()
    {
        $this->channel->close();
        $this->connection->close();
    }

    public function publish($queueName, $message)
    {
        $msg = new AMQPMessage($message);
        $this->channel->basic_publish($msg, '', $queueName);
    }

    public function consume($queueName, $callback)
    {
        $this->channel->basic_consume($queueName, '', false, true, false, false, $callback);

        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }
    }
}
