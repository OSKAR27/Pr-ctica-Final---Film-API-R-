<?php

namespace FilmBundle\Infrastructure\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ActorBundle\Application\UseCase\DeleteActorUseCase;
use Symfony\Component\HttpFoundation\Response;

class DeleteFilmController extends Controller
{
    private $deleteFilmUseCase;

    public function __construct(DeleteActorUseCase $deleteFilmUseCase)
    {
        $this->deleteFilmUseCase = $deleteFilmUseCase;

    }
    public function execute($id)
    {
        $this->deleteFilmUseCase->execute($id);

       return new Response('Film Deleted', 200);
    }

}