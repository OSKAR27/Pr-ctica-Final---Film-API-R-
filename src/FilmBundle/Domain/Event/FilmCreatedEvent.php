<?php

namespace FilmBundle\Domain\Event;

use FilmBundle\Domain\Entity\Film;
use Symfony\Component\EventDispatcher\Event;

class FilmCreatedEvent extends Event
{

    const TOPIC = "film.created";

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