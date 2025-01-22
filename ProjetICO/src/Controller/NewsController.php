<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    #[Route('/news', name: 'news')]
    public function index(NewsRepository $newsRepository): Response
    {
        // Récupérer toutes les actualités depuis le repository
        $news = $newsRepository->findAll();

        // Retourner la vue Twig avec les actualités
        return $this->render('news/index.html.twig', [
            'news' => $news,
        ]);
        
exit;
    }
}
