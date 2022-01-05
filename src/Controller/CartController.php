<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CartService;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart")
     */
    public function index(CartService $cartService): Response
    {

        return $this->render('cart/index.html.twig', [
            'products' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }

    /**
     * @Route("/panier/ajouter/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService) {   

        $cartService->add($id);
        
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/panier/supprimer/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService) {

        $cartService->remove($id);
        return $this->redirectToRoute('cart');
    }

}
