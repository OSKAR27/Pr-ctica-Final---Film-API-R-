<?php

namespace ActorBundle\Infrastructure\Controller;

use ActorBundle\Application\UseCase\ListActorUseCase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListActorController extends Controller
{
    private $listActorUseCase;

    public function __construct(ListActorUseCase $listActorUseCase)
    {
        $this->listActorUseCase = $listActorUseCase;
    }

    public function execute()
    {
        $actorsAsArray = $this->listActorUseCase->execute();

        return $this->render('Actor/list.html.twig',[
            'listactor' => $actorsAsArray
        ]);
        //return new JsonResponse($actorsAsArray);

        /*{
	        "name": "oscar"
        }*/
    }


}