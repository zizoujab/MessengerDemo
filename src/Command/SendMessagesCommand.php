<?php

namespace App\Command;

use App\Message\Message;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'app:send:messages',
    description: 'Sends a million message to rabbit mq Queue',
)]
class SendMessagesCommand extends Command
{

    public function __construct(private readonly  MessageBusInterface $bus, string $name = null)
    {
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        for( $i =0 ; $i < 10000000 ; $i++)
        {
            $this->bus->dispatch(new Message('Hello world ' . $i));
        }
        $io = new SymfonyStyle($input, $output);
        $io->success('Done');

        return Command::SUCCESS;
    }
}
