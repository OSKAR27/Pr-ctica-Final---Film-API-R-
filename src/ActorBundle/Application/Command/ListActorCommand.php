<?php

namespace ActorBundle\Application\Command;

use ActorBundle\Application\UseCase\ListActorUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListActorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:list-actor';
    private $listActorUseCase;

    public function __construct(ListActorUseCase $listActorUseCase)
    {
        $this->listActorUseCase = $listActorUseCase;
        parent::__construct();

    }


    protected function configure()
    {
        $this
            ->setName('app:list-actor')
            ->setDescription('List Actor');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $actorsAsArray = $this->listActorUseCase->execute();


        $output->writeln("List");

        foreach ($actorsAsArray as $actor) {
            $output->writeln('Id: ' . $actor->getId());
            $output->writeln('Name: ' . $actor->getName());
        }


    }
}