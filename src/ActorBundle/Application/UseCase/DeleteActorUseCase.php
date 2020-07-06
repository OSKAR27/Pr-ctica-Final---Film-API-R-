<?php

namespace ActorBundle\Application\UseCase;

use ActorBundle\Domain\Event\ActorDeletedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use ActorBundle\Domain\Entity\Actor;
use ActorBundle\Domain\Contracts\ActorRepository;

class DeleteActorUseCase
{
    private $actorRepository;

    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->actorRepository = $actorRepository;
    }

    public function execute(int $actorId)
    {
        $actor = $this->actorRepository->findOneById($actorId);

        $idActor = $actor->getId();

        $this->actorRepository->delete($actor);

        $this->dispatcher->dispatch(ActorDeletedEvent::TOPIC, new ActorDeletedEvent($idActor));

    }


}