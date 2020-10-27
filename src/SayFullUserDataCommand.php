<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;

class SayFullUserDataCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:quest')
            ->setDescription('say your name, age, and gender')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $nameQuestion = new Question('Введите ваше имя ', 'Без имени');
        $ageQuestion = new Question('Введите ваш возраст ', 'Без возраста');
        $genderQuestion = new ChoiceQuestion(
            'Ваш пол (М)',
            ['М', 'Ж'],
            0
        );


        $name = $helper->ask($input, $output, $nameQuestion);
        $age = $helper->ask($input, $output, $ageQuestion);
        $gender = $helper->ask($input, $output, $genderQuestion);

        $message = "Здравствуйте, $name Ваш возраст: $age Ваш пол: $gender";
        $output->writeln($message);

        return Command::SUCCESS;
     }
}
