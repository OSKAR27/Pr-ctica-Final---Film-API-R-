<?php

namespace ActorBundle\Application\Command;

use ActorBundle\Application\UseCase\NewActorUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateActorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-actor';

    private $newActorUseCase;

    public function __construct(NewActorUseCase $newActorUseCase)
    {
        $this->newActorUseCase = $newActorUseCase;
        parent::__construct();
        
    }

    protected function configure()
    {
        $this
            ->setName('app:create-actor')
            ->setDescription('Create a Actor...')
            ->addArgument(
                "name"
                , InputArgument::REQUIRED
                , "The actor name");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument("name");

        $this->newActorUseCase->execute($name);

        $output->writeln("Register.");
    }
}
