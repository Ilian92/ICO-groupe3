<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register_page')]
    public function register(): Response
    {
        $contents = $this->renderView('register/register.html.twig');
        return new Response($contents);
    }
}
