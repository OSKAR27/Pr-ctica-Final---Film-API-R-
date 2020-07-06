<?php

namespace FilmBundle\Infrastructure\Api;

use Symfony\Component\HttpFoundation\Request;
use FilmBundle\Application\UseCase\UpdatedFilmUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UpdateFilmController extends Controller
{
    private $updatedFilmUseCase;

    public function __construct(UpdatedFilmUseCase $updatedFilmUseCase)
    {
        $this->updatedFilmUseCase = $updatedFilmUseCase;
    }

    public function execute(Request $request)
    {
        $json = json_decode($request->getContent(), true);

        $filmId = $json["id"];
        $name = $json["name"];
        $description = $json["description"];
        $actorId = $json["actorid"];

        $this->updatedFilmUseCase->execute($filmId, $name, $description, $actorId);

        return new Response('Film Updated', 200);

    }

}