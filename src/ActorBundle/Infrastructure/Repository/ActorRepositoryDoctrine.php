<?php

namespace ActorBundle\Infrastructure\Repository;

use ActorBundle\Domain\Entity\Actor;
use ActorBundle\Domain\Contracts\ActorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class ActorRepositoryDoctrine extends EntityRepository implements ActorRepository
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Actor $actor): void
    {
        $this->entityManager->persist($actor);
        $this->entityManager->flush();
    }


    public function findOneById(int $id): ?Actor
    {
        return $this->entityManager
            ->createQuery(
                'SELECT actor FROM ActorBundle\Domain\Entity\Actor actor WHERE actor.id = :id'
            )
            ->setParameter('id', $id)
            ->getOneOrNullResult();
    }

    public function findAllOrderedByName()
    {
        return $this->entityManager
            ->createQuery(
                'SELECT actor FROM ActorBundle\Domain\Entity\Actor actor ORDER BY actor.name ASC'
            )
            ->getResult();
    }


    public function delete(Actor $actor): void
    {
        $this->entityManager->remove($actor);
        $this->entityManager->flush();
    }
}