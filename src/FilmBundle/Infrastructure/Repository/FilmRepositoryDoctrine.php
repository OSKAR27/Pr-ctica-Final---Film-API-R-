<?php

namespace FilmBundle\Infrastructure\Repository;

use FilmBundle\Domain\Entity\Film;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use FilmBundle\Domain\Contracts\FilmRepository;

class FilmRepositoryDoctrine extends EntityRepository implements FilmRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Film $film): void
    {
        $this->entityManager->persist($film);
        $this->entityManager->flush();
    }


    public function findOneById(int $id): ?Film
    {
        return $this->entityManager
            ->createQuery(
                'SELECT film FROM FilmBundle\Domain\Entity\Film film WHERE film.id = :id'
            )
            ->setParameter('id', $id)
            ->getOneOrNullResult();
    }

    public function findAllOrderedByName()
    {
        return $this->entityManager
            ->createQuery(
                'SELECT film FROM FilmBundle\Domain\Entity\Film film ORDER BY film.name ASC'
            )
            ->getResult();
    }


    public function delete(Film $film): void
    {
        $this->entityManager->remove($film);
        $this->entityManager->flush();
    }


}