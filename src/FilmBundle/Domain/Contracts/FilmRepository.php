<?php

namespace FilmBundle\Domain\Contracts;
use FilmBundle\Domain\Entity\Film;

interface FilmRepository
{
    public function save(Film $film): void;
    public function delete(Film $film): void;
    public function findAllOrderedByName();
    public function findOneById(int $id): ?Film;

}