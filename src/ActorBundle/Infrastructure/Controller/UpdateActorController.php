<?php

namespace ActorBundle\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ActorBundle\Application\UseCase\UpdatedActorUseCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateActorController extends Controller
{

    private $updatedActorUseCase;

    public function __construct(UpdatedActorUseCase $updatedActorUseCase)
    {
        $this->updatedActorUseCase = $updatedActorUseCase;
    }

    public function execute(Request $request)
    {
        $json = json_decode($request->getContent(), true);

        $actorId = $json['id'];
        $name = $json['name'];

        $this->updatedActorUseCase->execute($actorId, $name);

        return new Response('Actor Updated', 200);

    }

}