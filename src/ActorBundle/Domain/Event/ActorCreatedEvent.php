<?php

namespace ActorBundle\Domain\Event;

use ActorBundle\Domain\Entity\Actor;
use Symfony\Component\EventDispatcher\Event;

class ActorCreatedEvent extends Event
{

    const TOPIC = "actor.created";

    private $actor;

    public function __construct(Actor $actor)
    {
        $this->actor = $actor;
    }

    public function getActor(): Actor
    {
        return $this->actor;
    }

}