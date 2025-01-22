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
        // Récupérer uniquement les actualités ayant le statut "news"
        $news = $newsRepository->findByStatus('news');

        return $this->render('news/news.html.twig', [
            'news' => $news,
        ]);
    }

    #[Route('/events', name: 'events')]
    public function events(NewsRepository $newsRepository): Response
    {
        // Récupérer uniquement les événements ayant le statut "event"
        $events = $newsRepository->findByStatus('event');

        return $this->render('news/events.html.twig', [
            'events' => $events,
        ]);
    }
}
