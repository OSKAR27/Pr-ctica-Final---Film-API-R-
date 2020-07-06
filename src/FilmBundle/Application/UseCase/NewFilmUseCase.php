<?php

namespace FilmBundle\Application\UseCase;

use FilmBundle\Domain\Contracts\FilmRepository;
use FilmBundle\Domain\Event\FilmCreatedEvent;
use FilmBundle\Domain\Entity\Film;
use ActorBundle\Domain\Entity\Actor;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use ActorBundle\Domain\Contracts\ActorRepository;

class NewFilmUseCase
{
    private $actorRepository;
    private $filmRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->filmRepository = $filmRepository;
        $this->actorRepository = $actorRepository;
    }

    public function execute(string $name, string $description, int $actorid)
    {
        $actor = $this->actorRepository->findOneById($actorid);
        $film = new Film($name,$description,$actor);

        $this->filmRepository->save($film);

        $this->dispatcher->dispatch(FilmCreatedEvent::TOPIC, new FilmCreatedEvent($film));

    }
}