<?php

namespace FilmBundle\Application\UseCase;

use FilmBundle\Domain\Contracts\FilmRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ListFilmUseCase
{
    private $filmRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->filmRepository = $filmRepository;
    }

    public function execute()
    {
        $films = $this->filmRepository->findAllOrderedByName();

        return $films;
    }
}