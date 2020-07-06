<?php

namespace ActorBundle\Application\UseCase;

use ActorBundle\Domain\Contracts\ActorRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use ActorBundle\Domain\Entity\Actor;

class ListActorUseCase
{
    private $actorRepository;

    private $dispatcher;

    public function __construct(ActorRepository $actorRepository, EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
        $this->actorRepository = $actorRepository;
    }

    public function execute()
    {
        $actorsAll = $this->actorRepository->findAllOrderedByName();

        return $actorsAll;

    }


}