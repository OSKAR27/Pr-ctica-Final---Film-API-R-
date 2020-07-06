<?php

namespace FilmBundle\Application\Command;

use FilmBundle\Application\UseCase\ListFilmUseCase;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListFilmCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:list-film';

    private $listFilmUseCase;

    public function __construct(ListFilmUseCase $listFilmUseCase)
    {
        $this->listFilmUseCase = $listFilmUseCase;
        parent::__construct();

    }

    protected function configure()
    {
        $this
            ->setName('app:list-film')
            ->setDescription('List Film..');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("List");

        $films = $this->listFilmUseCase->execute();
        $filmsAsArray = array_map(function ($f) {
            return  [
                'id' => $f->getId(),
                'name' => $f->getName(),
                'description' => $f->getDescription(),
                'actor' => $f->getActor()->getName()
            ];
        }, $films);

       $output->writeln(var_dump($filmsAsArray));
    }
}