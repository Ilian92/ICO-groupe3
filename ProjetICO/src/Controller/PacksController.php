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
        // Récupérer toutes les actualités depuis le repository
        $packs = $packsRepository->findAll();

        // Retourner la vue Twig avec les actualités
        return $this->render('packs/index.html.twig', [
            'packs' => $packs,
        ]);
        
exit;
    }
}
