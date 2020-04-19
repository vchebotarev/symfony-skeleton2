<?php

declare(strict_types=1);

namespace App\RabbitMq\Consumer;

use Doctrine\ORM\ORMException;
use InvalidArgumentException;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use OldSound\RabbitMqBundle\RabbitMq\Exception\StopConsumerException;
use PhpAmqpLib\Message\AMQPMessage;
use Psr\Log\LoggerInterface;
use Throwable;

class TestConsumer implements ConsumerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(AMQPMessage $msg): int
    {
        try {
            $data = json_try_decode($msg->getBody(), true);
            if (!is_array($data)) {
                throw new InvalidArgumentException('Message body should be json array');
            }
        } catch (Throwable $throwable) {
            $this->logger->error('Could not deserialize message', [
                'message' => $msg->getBody(),
                'exception' => $throwable,
            ]);
            return ConsumerInterface::MSG_REJECT;
        }

        try {
            // some action

            return ConsumerInterface::MSG_ACK;
        } catch (Throwable $e) {
            if ($e instanceof ORMException && $e->getMessage() === 'The EntityManager is closed.') {
                $this->logger->error('Could not process message, restarting consumer', [
                    'exception' => $e,
                    'message' => $msg->getBody(),
                ]);
                throw new StopConsumerException();
            }

            $this->logger->error('Could not process message', [
                'exception' => $e,
                'message' => $msg->getBody(),
            ]);
            return ConsumerInterface::MSG_REJECT_REQUEUE;
        }
    }
}
