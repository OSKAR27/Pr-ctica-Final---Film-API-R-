<?php

namespace FilmBundle\Infrastructure\Api;

use FilmBundle\Application\UseCase\ListFilmUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListFilmController extends Controller
{
    private $listFilmUseCase;

    public function __construct(ListFilmUseCase $listFilmUseCase)
    {
        $this->listFilmUseCase = $listFilmUseCase;

    }

    public function execute()
    {
        $films = $this->listFilmUseCase->execute();
        $filmsAsArray = array_map(function ($f) {
            return  [
                'id' => $f->getId(),
                'name' => $f->getName(),
                'description' => $f->getDescription(),
                'actor' => $f->getActor()->getName()
            ];
        }, $films);
        return new JsonResponse($filmsAsArray);
    }


}