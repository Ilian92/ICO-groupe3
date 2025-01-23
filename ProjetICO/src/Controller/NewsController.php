<?php
namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/news')]
class NewsController extends AbstractController
{
    #[Route('/', name: 'news', methods: ['GET'])]
    public function listNews(NewsRepository $newsRepository): Response
    {
        $news = $newsRepository->findByStatus('news');

        return $this->render('news/news.html.twig', [
            'news' => $news,
        ]);
    }

    #[Route('/{id}', name: 'news_show', methods: ['GET'])]
    public function showNews(int $id, NewsRepository $newsRepository): Response
    {
        $news = $newsRepository->find($id);

        if (!$news) {
            throw $this->createNotFoundException('La news demandée n\'existe pas.');
        }

        return $this->render('news/show.html.twig', [
            'singleNews' => $news,
        ]);
    }

    #[Route('/events', name: 'events', methods: ['GET'])]
    public function events(NewsRepository $newsRepository): Response
    {
        $events = $newsRepository->findByStatus('event');

        return $this->render('events/events.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('/events/{id}', name: 'events_show', methods: ['GET'])]
    public function show_events(int $id, NewsRepository $newsRepository): Response
    {
        $singleEvent = $newsRepository->find($id);

        if (!$singleEvent) {
            throw $this->createNotFoundException('L\'event demandé n\'existe pas.');
        }

        return $this->render('events/event_show.html.twig', [
            'singleEvent' => $singleEvent,
        ]);
    }
}