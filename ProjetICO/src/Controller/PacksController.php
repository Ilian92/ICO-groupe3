<?php

namespace App\Controller;

use App\Repository\PacksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PacksController extends AbstractController
{
    #[Route('/packs', name: 'packs')]
    public function index(PacksRepository $packsRepository): Response
    {
        // Récupérer tous les packs depuis le repository
        $packs = $packsRepository->findAll();

        // Retourner la vue Twig avec les packs
        return $this->render('packs/index.html.twig', [
            'packs' => $packs,
        ]);
    }

    #[Route('/packs/{id}', name: 'packs_show')]
    public function show(int $id, PacksRepository $packsRepository): Response
    {
        $pack = $packsRepository->find($id);

        if (!$pack) {
            throw $this->createNotFoundException('Le pack demandé n\'existe pas.');
        }

        return $this->render('packs/show.html.twig', [
            'pack' => $pack,
            'cards' => $pack->getCards(),
        ]);
    }
}
