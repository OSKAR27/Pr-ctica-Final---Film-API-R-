<?php

namespace FilmBundle\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteFilmController extends Controller
{

    public function execute($id)
    {
        $em = $this->getDoctrine()->getManager();

       $film = $em->getReference('\MyApp\Component\Film\Domain\Film', $id);

       $em->remove($film);
       $em->flush();

       return new Response('Film Deleted', 200);
    }

}