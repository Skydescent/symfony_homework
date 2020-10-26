<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Input\InputArgument;

class SayHelloCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('say_hello')
            ->setDescription('say hello to arg')
            ->addArgument('string', InputArgument::REQUIRED, 'To whom say hello?')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $message = 'Привет, ' . $input->getArgument('string');
	$output->writeln($message);

        return Command::SUCCESS;
    }
}
