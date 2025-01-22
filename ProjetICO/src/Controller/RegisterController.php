<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\UserRole;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class RegisterController extends AbstractController
{
    // Injecting FormFactoryInterface to create the form
    private FormFactoryInterface $formFactory;

    // Constructor injection of FormFactoryInterface
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    #[Route('/register', name: 'register', methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, ValidatorInterface $validator): Response
    {
        $user = new Users();

        $defaultRole = $entityManager->getRepository(Users::class)->find("ROLE_USER");
        if (!$defaultRole) {
            throw new \Exception('Default role not found.');
        }
        $user->setRoles($defaultRole);

        $form = $this->formFactory->create(RegisterType::class, $user);

        $form->handleRequest($request);

        $errorMessage = [];

        if ($form->isSubmitted() && $form->isValid()) {
            // Check if the email already exists in the database
            $existingUser = $entityManager->getRepository(Users::class)->findOneBy(['email' => $user->getEmail()]);
            if ($existingUser) {
                $errorMessage[] = "L'email est déjà utilisé.";
            }

            if (strlen($user->getPassword()) < 8) {
                $errorMessage[] = "Le mot de passe doit comporter au moins 8 caractères.";
            }
            // Hash the password
            $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $user->setPassword($hashedPassword);

            if (empty($errorMessage)) {
                // Encoder le mot de passe avant de l'enregistrer
                $user->setPassword($hashedPassword);

                $user->setCreatedAt(new \DateTimeImmutable());

                // Enregistrement de l'utilisateur dans la base de données
                $entityManager->persist($user);
                $entityManager->flush();

                // Redirection après la création
                $this->addFlash('success', 'Registration réussi !');
                return $this->redirectToRoute('app_login');
            }
        }

        return $this->render('register/register.html.twig', [
            'form' => $form->createView(),
            'errorMessage' => $errorMessage,
        ]);
    }
}
