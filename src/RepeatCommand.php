<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RepeatCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('repeat')
            ->setDescription('repeat string 2 or more times')
            ->addArgument('string', InputArgument::REQUIRED, 'String to repeat')
            ->addOption(
                'times',
                null,
                InputOption::VALUE_REQUIRED,
                'How many times should i print message?',
                2
            )
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $message = $input->getArgument('string');

        for ($i = 0; $i < $input->getOption('times'); $i++) {
            $output->writeln($message);
        }

        return Command::SUCCESS;
     }
}
