<?php

namespace App\Controller;

use App\Repository\CardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardsController extends AbstractController
{
    #[Route('/cards', name: 'cards_index')]
    public function index(CardsRepository $cardsRepository): Response
    {
        $cards = $cardsRepository->findAll();

        return $this->render('cards/index.html.twig', [
            'cards' => $cards,
        ]);
    }

    #[Route('/cards/{id}', name: 'card_show')]
    public function show(int $id, CardsRepository $cardsRepository): Response
    {
        // Récupérer la carte spécifique par son ID
        $card = $cardsRepository->find($id);

        // Si la carte n'existe pas, afficher une erreur 404
        if (!$card) {
            throw $this->createNotFoundException('La carte demandée n\'existe pas.');
        }

        // Retourner la vue Twig avec les détails de la carte et le pack associé
        return $this->render('cards/show.html.twig', [
            'card' => $card,
            'pack' => $card->getPackId(),
        ]);
    }
}
