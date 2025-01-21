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

        $defaultRole = $entityManager->getRepository(UserRole::class)->find(1);
        if (!$defaultRole) {
            throw new \Exception('Default role not found.');
        }
        $user->setRoleId($defaultRole);

        $form = $this->formFactory->create(RegisterType::class, $user);

        $form->handleRequest($request);

        $errorMessage = [];

        if ($form->isSubmitted() && $form->isValid()) {
            // Check if the email already exists in the database
            $existingUser = $entityManager->getRepository(Users::class)->findOneBy(['email' => $user->getEmail()]);
            if ($existingUser) {
                // If the email already exists, add an error to the form and return the view
                $form->addError(new \Symfony\Component\Form\FormError('This email address is already in use.'));
                return $this->render('register/register.html.twig', [
                    'form' => $form->createView(),
                ]);
            }
            // Hash the password
            $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
            $user->setPassword($hashedPassword);

            // Set the createdAt field (automatically set to current time)
            $user->setCreatedAt(new \DateTimeImmutable());

            // Persist the user to the database
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirect or provide feedback to the user
            $this->addFlash('success', 'Registration successful!');
            return $this->redirectToRoute('login'); // Or any other route
        }

        return $this->render('register/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
