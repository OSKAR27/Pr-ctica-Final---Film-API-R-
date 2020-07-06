<?php

namespace ActorBundle\Application\UseCase;

use ActorBundle\Domain\Entity\Actor;
use ActorBundle\Domain\Contracts\ActorRepository;
use ActorBundle\Domain\Event\ActorCreatedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class NewActorUseCase
{
    private $actorRepository;

    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->actorRepository = $actorRepository;
    }

    public function execute(string $actorName)
    {
        $actor = new Actor($actorName);

        $this->actorRepository->save($actor);

        $this->dispatcher->dispatch(ActorCreatedEvent::TOPIC, new ActorCreatedEvent($actor));

    }


}