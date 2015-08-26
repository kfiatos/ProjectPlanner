<?php

namespace ProjectPlannerBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use ProjectPlannerBundle\Entity\Project;
use ProjectPlannerBundle\Form\ProjectType;



class ListUsersCommand extends ContainerAwareCommand
{
    protected function configure(){
        $this
            ->setName('ProjectPlanner:list:users')
            ->setDescription('Generates list of users in all projects')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){

        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $entities = $em->getRepository('ProjectPlannerBundle:Project')->findAll();

            foreach ($entities as $entity) {
                $output->writeln("----------------------------------------");
                $output->write("Nazwa projektu: ");
                $output->writeln($entity->getTitle());

                if($entity->getUsers()->count()) {
                    $output->writeln("Użytkownicy biorący udział w projekcie: ");

                    foreach ($entity->getUsers() as $user) {
                        $userName = $user->getUsername();
                        $output->writeln($userName);
                    }
                }else{
                    $output->writeln("Brak użytkowników w tym projekcie");
                }


            }
        }

//        $moneyConverter = $this->getContainer()->get('money_converter');
//        $output->writeln(var_export($moneyConverter->getRates(), true));
        //Dodana próbka Eventu w CLI
//        $this
//            ->getContainer()->get('event_dispatcher')
//            ->dispatch('app.hello', new HelloEvent());

}