<?php

namespace App\Controller;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PacksRepository; // Import du repository Pack
use Symfony\Component\HttpFoundation\Response; // Corrige la classe Response


class PaymentController extends AbstractController
{
    #[Route('/create-checkout-session', name: 'create_checkout_session', methods: ['POST'])]
    public function createCheckoutSession(Request $request, PacksRepository $packsRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // Vérifiez que les données sont valides
        $packId = $data['pack_id'] ?? null;
        $packName = $data['pack_name'] ?? 'Pack inconnu';
        $price = $data['price'] ?? 0;

        // Assurez-vous que le pack existe
        $pack = $packsRepository->find($packId);
        if (!$pack) {
            return new JsonResponse(['error' => 'Pack non trouvé'], 404);
        }

        \Stripe\Stripe::setApiKey($this->getParameter('stripe.secret_key'));

        $successUrl = $this->generateUrl('success_url', [], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
        $cancelUrl = $this->generateUrl('cancel_url', [], \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
        
        
        // Créez une session de paiement (ne sera pas atteint si dd est utilisé)
        $checkoutSession = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $packName,
                    ],
                    'unit_amount' => $price,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
        ]);

        return new JsonResponse(['id' => $checkoutSession->id]);
    }


    #[Route('/success', name: 'success_url')]
    public function success(): Response
    {
        return $this->render('payment/success.html.twig');
    }

    #[Route('/cancel', name: 'cancel_url')]
    public function cancel(): Response
    {
        return $this->render('payment/cancel.html.twig');
    }
}
