<?php

namespace FilmBundle\Application\Command;

use FilmBundle\Application\UseCase\UpdatedFilmUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class UpdateFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:update-film';
    private $updatedFilmUseCase;

    public function __construct(UpdatedFilmUseCase $updatedFilmUseCase)
    {
        $this->updatedFilmUseCase = $updatedFilmUseCase;
        parent::__construct();

    }

    protected function configure()
    {
        $this
            ->setName('app:update-film')
            ->setDescription('Update Film...')
            ->addArgument(
                "id"
                , InputArgument::REQUIRED
                , "The Film id")
            ->addArgument(
                "name"
                , InputArgument::REQUIRED
                , "The film name")
            ->addArgument(
              "description",
                InputArgument::REQUIRED,
                "The film description"
            )
            ->addArgument(
                "actorid",
                InputArgument::REQUIRED,
                "The film description"
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filmId = $input->getArgument("id");
        $name = $input->getArgument("name");
        $description = $input->getArgument("description");
        $actorId = $input->getArgument('actorid');

        $this->updatedFilmUseCase->execute($filmId, $name, $description, $actorId);
        
        $output->writeln("Updated.");
    }
}