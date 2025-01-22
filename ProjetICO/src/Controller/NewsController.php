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

    // Nouvelle méthode pour afficher une news spécifique
    #[Route('/news/{id}', name: 'news_show')]
    public function show_news(int $id, NewsRepository $newsRepository): Response
    {
        // Récupérer le pack spécifique par son ID
        $singleNews = $newsRepository->find($id);

        // Si le pack n'existe pas, afficher une erreur 404
        if (!$singleNews) {
            throw $this->createNotFoundException('La news demandé n\'existe pas.');
        }

        // Retourner la vue Twig avec les détails du pack
        return $this->render('news/show.html.twig', [
            'singleNews' => $singleNews,
        ]);
    }

    #[Route('/events', name: 'events')]
    public function events(NewsRepository $newsRepository): Response
    {
        // Récupérer uniquement les événements ayant le statut "event"
        $events = $newsRepository->findByStatus('event');

        return $this->render('events/events.html.twig', [
            'events' => $events,
        ]);
    }


    // Nouvelle méthode pour afficher une news spécifique
    #[Route('/events/{id}', name: 'events_show')]
    public function show_events(int $id, NewsRepository $newsRepository): Response
    {
        // Récupérer le pack spécifique par son ID
        $singleEvent = $newsRepository->find($id);

        // Si le pack n'existe pas, afficher une erreur 404
        if (!$singleEvent) {
            throw $this->createNotFoundException('L\'event demandé n\'existe pas.');
        }

        // Retourner la vue Twig avec les détails du pack
        return $this->render('events/event_show.html.twig', [
            'singleEvent' => $singleEvent,
        ]);
    }
}
