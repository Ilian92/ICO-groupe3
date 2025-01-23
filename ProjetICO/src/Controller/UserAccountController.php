<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class UserAccountController extends AbstractController
{
    #[Route('/compte', name: 'user_account')]
    public function index(): Response
    {
        return $this->render('user_account/index.html.twig');
    }

    #[Route('/panier', name: 'cart')]
    public function cart(): Response
    {
        return $this->render('user_account/cart.html.twig');
    }

    #[Route('/historique', name: 'order_history')]
    public function orderHistory(): Response
    {
        return $this->render('user_account/order_history.html.twig');
    }

    #[Route('/compte/modifier', name: 'user_account_edit', methods: ['GET', 'POST'])]
    public function editProfile(Request $request, EntityManagerInterface $entityManager, UserInterface $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('user_account');
        }

        return $this->render('user_account/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}