<?php

namespace ActorBundle\Application\UseCase;

use ActorBundle\Domain\Entity\Actor;
use ActorBundle\Domain\Contracts\ActorRepository;
use ActorBundle\Domain\Event\ActorUpdatedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdatedActorUseCase
{
    private $actorRepository;

    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->actorRepository = $actorRepository;
    }

    public function execute(int $idActor,string $actorName)
    {
        $actor = $this->actorRepository->findOneById($idActor);

        $actor->setName($actorName);

        $this->actorRepository->save($actor);
        $this->dispatcher->dispatch(ActorUpdatedEvent::TOPIC, new ActorUpdatedEvent($actor));

    }


}