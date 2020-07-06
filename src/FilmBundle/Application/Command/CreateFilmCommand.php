<?php

namespace FilmBundle\Application\Command;

use FilmBundle\Application\UseCase\NewFilmUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class CreateFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-film';

    private $newFilmUseCase;

    public function __construct(NewFilmUseCase $newFilmUseCase)
    {
        $this->newFilmUseCase = $newFilmUseCase;
        parent::__construct();

    }

    protected function configure()
    {
        $this
            ->setName('app:create-film')
            ->setDescription('Create Film')
            ->addArgument(
                "name"
                , InputArgument::REQUIRED
                , "The film name")
            ->addArgument(
              "description",
                InputArgument::REQUIRED,
                "The film description"
            )->addArgument(
                "actorId",
                InputArgument::REQUIRED,
                "The Actor id"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument("name");
        $description = $input->getArgument("description");
        $actorId = $input->getArgument("actorId");


        $this->newFilmUseCase->execute($name, $description, $actorId);

        $output->writeln("Register.");
    }
}
