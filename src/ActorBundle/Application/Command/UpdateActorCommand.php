<?php

namespace ActorBundle\Application\Command;

use ActorBundle\Application\UseCase\UpdatedActorUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class UpdateActorCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:update-actor';
    private $updatedActorUseCase;

    public function __construct(UpdatedActorUseCase $updatedActorUseCase)
    {
        $this->updatedActorUseCase = $updatedActorUseCase;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:update-actor')
            ->setDescription('Update Actor')
            ->addArgument(
                "id"
                , InputArgument::REQUIRED
                , "The actor id")
            ->addArgument(
                "name"
                , InputArgument::REQUIRED
                , "The actor name");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $actorId = $input->getArgument("id");
        $name = $input->getArgument("name");

        $this->updatedActorUseCase->execute($actorId, $name);

        $output->writeln("Updated.");
    }
}