<?php

namespace ActorBundle\Infrastructure\Controller;

use ActorBundle\Application\UseCase\NewActorUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateActorController extends Controller
{
    private $newActorUseCase;

    public function __construct(NewActorUseCase $newActorUseCase)
    {
        $this->newActorUseCase = $newActorUseCase;
    }


    public function execute(Request $request)
    {
        $json = json_decode($request->getContent(), true);

        $name = $json['name'];

        $this->newActorUseCase->execute($name);

        return new Response('Actor Created', 201);

    }

}