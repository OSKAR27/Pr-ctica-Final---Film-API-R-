<?php

namespace ActorBundle\Infrastructure\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ActorBundle\Application\UseCase\ListActorUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;


class ListActorController extends Controller
{
    private $listActorUseCase;

    public function __construct(ListActorUseCase $listActorUseCase)
    {
        $this->listActorUseCase = $listActorUseCase;
    }

    public function execute()
    {
        $actors = $this->listActorUseCase->execute();

        $actorsAsArray = array_map(function ($actor) {
            return  [
                'id' => $actor->getId(),
                'name' => $actor->getName()
            ];
        }, $actors);


        return new JsonResponse($actorsAsArray);

        /*{
	        "name": "oscar"
        }*/
    }

}