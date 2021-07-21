<?php

// src/Controller/GameController.php

namespace App\Controller;


use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/games", name="game_")
*/

class GameController extends AbstractController
{
    /**
    * Show all rows from game’s entity
    * @Route("/", name="index")
    * @return Response A response instance
    */
    public function index(): Response
    {
        $games = $this->getDoctrine()
            ->getRepository(Game::class)
            ->findAll();

        return $this->render(
            'game/index.html.twig',
            ['games' => $games]
        );
    }

    /**
    * Getting a game by id
    *
    * @Route("/show/{id<^[0-9]+$>}", name="show")
    * @return Response
    */
    public function show(int $id):Response
    {
        $game = $this->getDoctrine()
            ->getRepository(Game::class)
            ->findOneBy(['id' => $id]);

        if (!$game) {
            throw $this->createNotFoundException(
                'No game with id : '.$id.' found in game\'s table.'
            );
        }
        return $this->render('game/show.html.twig', [
            'game' => $game,
        ]);
    }
}

