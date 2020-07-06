<?php

namespace ActorBundle\Application\Command;

use ActorBundle\Application\UseCase\DeleteActorUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class DeleteActorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:delete-actor-command';
    private $deleteActorUseCase;

    public function __construct(DeleteActorUseCase $deleteActorUseCase)
    {
        $this->deleteActorUseCase = $deleteActorUseCase;
        parent::__construct();

    }

    protected function configure()
    {
        $this
            ->setName('app:delete-actor')
            ->setDescription('Delete Actor')
            ->addArgument(
                "id"
                , InputArgument::REQUIRED
                , "The actor id");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $actorId = $input->getArgument("id");

        $this->deleteActorUseCase->execute($actorId);

        $output->writeln("Deleted.");
    }
}