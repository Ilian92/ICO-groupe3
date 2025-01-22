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

    #[Route('/packs/{id}', name: 'pack_show')]
    public function show(int $id, PacksRepository $packsRepository): Response
    {
        // Récupérer le pack spécifique par son ID
        $pack = $packsRepository->find($id);

        // Si le pack n'existe pas, afficher une erreur 404
        if (!$pack) {
            throw $this->createNotFoundException('Le pack demandé n\'existe pas.');
        }

        // Retourner la vue Twig avec les détails du pack et les cartes associées
        return $this->render('packs/show.html.twig', [
            'pack' => $pack,
            'cards' => $pack->getCards(), // Récupérer les cartes associées au pack
        ]);
    }
}
