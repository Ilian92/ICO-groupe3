<?php
namespace App\Controller;

use App\Entity\Packs;
use App\Repository\PacksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/packs')]
class PacksController extends AbstractController
{
    #[Route('', name: 'packs_index', methods: ['GET'])]
    public function index(PacksRepository $packsRepository): Response
    {
        $packs = $packsRepository->findAll();

        return $this->render('packs/index.html.twig', [
            'packs' => $packs,
        ]);
    }

    #[Route('/{id}', name: 'packs_show', methods: ['GET'])]
    public function show(Packs $pack): Response
    {
        return $this->render('packs/show.html.twig', [
            'pack' => $pack,
            'cards' => $pack->getCards(),
            'cardCount' => count($pack->getCards()),
            'stripe_public_key' => $this->getParameter('stripe.public_key'), // Ajout de la clé publique
        ]);
    }
    
}