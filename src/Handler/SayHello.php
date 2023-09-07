<?php

namespace App\Handler;
use App\Message\Message;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Contracts\Service\Attribute\Required;

#[AsMessageHandler]
class SayHello
{

    private LoggerInterface $logger;

    public function __invoke(Message $message)
    {
        $this->logger->debug("Received a message " . $message->getText());
    }

    #[Required]
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}