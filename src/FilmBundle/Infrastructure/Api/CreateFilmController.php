<?php

namespace FilmBundle\Infrastructure\Api;

use Symfony\Component\HttpFoundation\Request;
use FilmBundle\Application\UseCase\NewFilmUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CreateFilmController extends Controller
{

    private $newFilmUseCase;

    public function __construct(NewFilmUseCase $newFilmUseCase)
    {
        $this->newFilmUseCase = $newFilmUseCase;
    }

    public function execute(Request $request)
    {

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];
        $description = $json['description'];
        $actorId = $json['actorId'];

        $this->newFilmUseCase->execute($name, $description, $actorId);

        return new Response('Film Created', 201);

    }

}