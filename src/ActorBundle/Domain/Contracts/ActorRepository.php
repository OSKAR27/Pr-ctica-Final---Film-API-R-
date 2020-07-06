<?php

namespace ActorBundle\Domain\Contracts;
use ActorBundle\Domain\Entity\Actor;


interface ActorRepository
{

    public function save(Actor $actor): void;
    public function delete(Actor $actor): void;
    public function findAllOrderedByName();
    public function findOneById(int $id): ?Actor;

}