<?php

namespace ActorBundle\Infrastructure\Api;

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
        //$json = json_decode($request->getContent(), true);

        //$name = $json['name'];

        $this->deleteActorUseCase->execute($id);

       return new Response('Actor Deleted', 200);
    }

}