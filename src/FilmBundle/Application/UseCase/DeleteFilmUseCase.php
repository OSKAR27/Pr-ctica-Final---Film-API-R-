<?php

namespace FilmBundle\Application\UseCase;

use FilmBundle\Domain\Event\FilmDeletedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use FilmBundle\Domain\Contracts\FilmRepository;

class DeleteFilmUseCase
{
    private $filmRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->filmRepository = $filmRepository;
    }

    public function execute(int $id)
    {
        $film = $this->filmRepository->findOneById($id);
        $this->filmRepository->delete($film);
        $this->dispatcher->dispatch(FilmDeletedEvent::TOPIC, new FilmDeletedEvent($film));

    }
}