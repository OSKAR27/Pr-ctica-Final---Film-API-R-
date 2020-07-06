<?php

namespace FilmBundle\Application\UseCase;

use ActorBundle\Domain\Contracts\ActorRepository;
use FilmBundle\Domain\Event\FilmUpdatedEven;
use FilmBundle\Domain\Entity\Film;
use ActorBundle\Domain\Entity\Actor;
use FilmBundle\Domain\Contracts\FilmRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdatedFilmUseCase
{
    private $filmRepository;
    private $actorRepository;
    private $dispatcher;

    public function __construct(FilmRepository $filmRepository, ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->filmRepository = $filmRepository;
        $this->dispatcher = $dispatcher;
        $this->actorRepository = $actorRepository;
    }

    public function execute(int $id, string $name, string $description, Actor $actor)
    {

        $film = $this->filmRepository->findOneById($id);

        $film->setName($name);
        $film->setDescription($description);
        $film->setActor($actor);

        $this->filmRepository->save($film);
        $this->dispatcher->dispatch(FilmUpdatedEven::TOPIC, new FilmUpdatedEven($film->getId()));



    }
}