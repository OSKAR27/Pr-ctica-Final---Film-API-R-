<?php

namespace FilmBundle\Application\Command;

use FilmBundle\Application\UseCase\DeleteFilmUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DeleteFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:delete-film';
    private $deleteFilmUseCase;

    public function __construct(DeleteFilmUseCase $deleteFilmUseCase)
    {
        $this->deleteFilmUseCase = $deleteFilmUseCase;
        parent::__construct();

    }

    protected function configure()
    {
        $this
            ->setName('app:delete-film')
            ->setDescription('Delete film...')
            ->addArgument(
                "id"
                , InputArgument::REQUIRED
                , "The film id");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filmId = $input->getArgument("id");

        $this->deleteFilmUseCase->execute($filmId);

        $output->writeln("Deleted.");
    }
}