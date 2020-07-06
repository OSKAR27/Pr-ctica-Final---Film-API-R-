<?php

namespace FilmBundle\Infrastructure\Controller;

use FilmBundle\Application\UseCase\ListFilmUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

        return $this->render('Film/list.html.twig',[
            'listfilms' => $filmsAsArray
        ]);
        //return new JsonResponse($filmsAsArray);
    }

}