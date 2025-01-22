<?php

namespace App\Controller;

use App\Repository\CardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardsController extends AbstractController
{
    #[Route('/cards', name: 'cards')]
    public function index(CardsRepository $cardsRepository): Response
    {
        // Récupérer les cartes depuis le repository
        $cards = $cardsRepository->findAll();

        // Passer les cartes au template
        return $this->render('cards/index.html.twig', [
            'cards' => $cards,
        ]);
    }
}
