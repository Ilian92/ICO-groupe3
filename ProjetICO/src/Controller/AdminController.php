<?php
namespace App\Controller;

use App\Entity\News;
use App\Entity\Packs;
use App\Form\NewsType;
use App\Form\PacksType;
use App\Repository\NewsRepository;
use App\Repository\PacksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'admin_dashboard', methods: ['GET'])]
    public function dashboard(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    #[Route('/news', name: 'admin_news_index', methods: ['GET'])]
    public function indexNews(NewsRepository $newsRepository): Response
    {
        return $this->render('news/index.html.twig', [
            'news' => $newsRepository->findAll(),
        ]);
    }

    #[Route('/news/new', name: 'admin_news_new', methods: ['GET', 'POST'])]
    public function newNews(Request $request, EntityManagerInterface $entityManager): Response
    {
        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($news);
            $entityManager->flush();

            return $this->redirectToRoute('admin_news_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('news/new.html.twig', [
            'news' => $news,
            'form' => $form,
        ]);
    }

    #[Route('/news/{id}', name: 'admin_news_show', methods: ['GET'])]
    public function showNews(News $news): Response
    {
        return $this->render('news/show.html.twig', [
            'news' => $news,
        ]);
    }

    #[Route('/news/{id}/edit', name: 'admin_news_edit', methods: ['GET', 'POST'])]
    public function editNews(Request $request, News $news, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NewsType::class, $news);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_news_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('news/edit.html.twig', [
            'news' => $news,
            'form' => $form,
        ]);
    }

    #[Route('/news/{id}', name: 'admin_news_delete', methods: ['POST'])]
    public function deleteNews(Request $request, News $news, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$news->getId(), $request->get('_token'))) {
            $entityManager->remove($news);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_news_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/packs', name: 'admin_packs_index', methods: ['GET'])]
    public function indexPacks(PacksRepository $packsRepository): Response
    {
        return $this->render('packs/admin_index.html.twig', [
            'packs' => $packsRepository->findAll(),
        ]);
    }

    #[Route('/packs/new', name: 'admin_packs_new', methods: ['GET', 'POST'])]
    public function newPacks(Request $request, EntityManagerInterface $entityManager): Response
    {
        $pack = new Packs();
        $form = $this->createForm(PacksType::class, $pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($pack);
            $entityManager->flush();

            return $this->redirectToRoute('admin_packs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('packs/new.html.twig', [
            'pack' => $pack,
            'form' => $form,
        ]);
    }

    #[Route('/packs/{id}', name: 'admin_packs_show', methods: ['GET'])]
    public function showPacks(Packs $pack): Response
    {
        return $this->render('packs/show.html.twig', [
            'pack' => $pack,
            'cards' => $pack->getCards(),
            'cardCount' => count($pack->getCards())
        ]);
    }

    #[Route('/packs/{id}/edit', name: 'admin_packs_edit', methods: ['GET', 'POST'])]
    public function editPacks(Request $request, Packs $pack, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PacksType::class, $pack);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('admin_packs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('packs/edit.html.twig', [
            'pack' => $pack,
            'form' => $form,
        ]);
    }

    #[Route('/packs/{id}', name: 'admin_packs_delete', methods: ['POST'])]
    public function deletePacks(Request $request, Packs $pack, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pack->getId(), $request->get('_token'))) {
            $entityManager->remove($pack);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_packs_index', [], Response::HTTP_SEE_OTHER);
    }
}