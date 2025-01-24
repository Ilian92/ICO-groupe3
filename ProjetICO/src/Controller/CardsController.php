<?php
namespace App\Controller;

use App\Repository\CardsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cards')]
class CardsController extends AbstractController
{
    #[Route('/', name: 'cards_index', methods: ['GET'])]
    public function index(CardsRepository $cardsRepository): Response
    {
        $cards = $cardsRepository->findAll();

        return $this->render('cards/index.html.twig', [
            'cards' => $cards,
        ]);
    }

    #[Route('/{id}', name: 'card_show', methods: ['GET'])]
    public function show(int $id, CardsRepository $cardsRepository): Response
    {
        $card = $cardsRepository->find($id);

        if (!$card) {
            throw $this->createNotFoundException('La carte demandée n\'existe pas.');
        }

        return $this->render('cards/show.html.twig', [
            'card' => $card,
        ]);
    }
}