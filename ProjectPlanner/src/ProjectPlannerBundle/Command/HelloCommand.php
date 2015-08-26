<?php

namespace ProjectPlannerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class HelloCommand extends ContainerAwareCommand
{
    protected function configure(){
        $this
            ->setName('hello:test')
            ->setDescription('Generates a Hello string')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'Kogo chcesz przywitać?'
            )
            ->addArgument(
                'count',
                InputArgument::OPTIONAL,
                'ile razy powtórzyć wyświetlenie pierwszego parametru'
            )
            ->addOption(
                'krzyk',
                'null',
                InputOption::VALUE_OPTIONAL,
                'zwraca tekst dużymi literami'
            );

    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $name = $input->getArgument('name');
        $count = $input->getArgument('count');

            $text = ($name) ? 'Hello '.str_repeat($name." ", $count) : 'Hello';

        if ($input->getOption('krzyk')) {
            $text = strtoupper($text);
        }else{
            $output->write($text);
        }

//        $moneyConverter = $this->getContainer()->get('money_converter');
//        $output->writeln(var_export($moneyConverter->getRates(), true));
        //Dodana próbka Eventu w CLI
//        $this
//            ->getContainer()->get('event_dispatcher')
//            ->dispatch('app.hello', new HelloEvent());
    }
}