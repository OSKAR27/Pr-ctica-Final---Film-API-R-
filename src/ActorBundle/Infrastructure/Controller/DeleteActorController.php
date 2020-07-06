<?php

namespace ActorBundle\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ActorBundle\Application\UseCase\DeleteActorUseCase;
use Symfony\Component\HttpFoundation\Response;

class DeleteActorController extends Controller
{
    private $deleteActorUseCase;

    public function __construct(DeleteActorUseCase $deleteActorUseCase)
    {
        $this->deleteActorUseCase = $deleteActorUseCase;
    }

    public function execute($id)
    {
        $this->deleteActorUseCase->execute($id);

       return new Response('Actor Deleted', 200);
    }

}