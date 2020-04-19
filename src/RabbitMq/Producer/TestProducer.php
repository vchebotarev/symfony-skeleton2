<?php

declare(strict_types=1);

namespace App\RabbitMq\Producer;

use BadMethodCallException;
use OldSound\RabbitMqBundle\RabbitMq\Producer;

class TestProducer extends Producer
{
    public function publish($msgBody, $routingKey = '', $additionalProperties = [], array $headers = null): void
    {
        throw new BadMethodCallException('Use more concrete method instead where structure will be encapsulated');
    }
}
