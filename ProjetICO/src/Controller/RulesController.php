<?php
// filepath: /c:/Users/morga/OneDrive/Documents/EEMI/3ème année/-- WORKSHOP ICO/ICO-groupe3/ProjetICO/src/Controller/RulesController.php
namespace App\Controller;

use App\Repository\RulesRepository;
use App\Repository\CardsRepository;
use App\Repository\PacksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RulesController extends AbstractController
{
    #[Route('/regles', name: 'rules')]
    public function index(RulesRepository $rulesRepository, CardsRepository $cardsRepository, PacksRepository $packsRepository): Response
    {
        $rules = $rulesRepository->findAll();
        $cards = $cardsRepository->findAll();
        $packs = $packsRepository->findAll();

        $totalCardsInPacks = [];
        foreach ($packs as $pack) {
            $totalCardsInPacks[$pack->getId()] = $packsRepository->getTotalCardsInPack($pack->getId());
        }

        return $this->render('rules/index.html.twig', [
            'rules' => $rules,
            'cards' => $cards,
            'packs' => $packs,
            'totalCardsInPacks' => $totalCardsInPacks,
        ]);
    }
}