<?php
// filepath: /C:/Users/morga/OneDrive/Documents/EEMI/3ème année/-- WORKSHOP ICO/ICO-groupe3/ProjetICO/src/Controller/UserAccountController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}