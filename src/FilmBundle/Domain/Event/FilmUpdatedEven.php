<?php

namespace FilmBundle\Domain\Event;

use FilmBundle\Domain\Entity\Film;
use Symfony\Component\EventDispatcher\Event;

class FilmUpdatedEven extends Event
{

    const TOPIC = "film.updated";

    private $film;

    public function __construct(Film $film)
    {
        $this->film = $film;
    }

    public function getFilm(): Film
    {
        return $this->film;
    }

}