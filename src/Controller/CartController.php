<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductRepository;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart")
     */
    public function index(SessionInterface $session, ProductRepository $productRepository): Response
    {
        // get session cart wich is an empty table
        $cart = $session->get('cart', []);
        $cartWithData = [];

        foreach($cart as $id => $quantity) {
            $cartWithData[] = [
                'product' => $productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach($cartWithData as $product) {
            $totalProduct = $product['product']->getPrice() * $product['quantity'];
            $total += $totalProduct;
        }
        
        return $this->render('cart/index.html.twig', [
            'products' => $cartWithData,
            'total' => $total
        ]);
    }

    /**
     * @Route("/panier/ajouter/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session) {
        
        // get session cart wich is an empty table
        $cart = $session->get('cart', []);
        if(!empty($cart[$id])) {
            $cart[$id]++;
        }
        else {
            $cart[$id] = 1;  
        }
        $session->set('cart', $cart);
        
        return $this->redirectToRoute('cart');
    }

    /**
     * @Route("/panier/supprimer/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session) {
        $cart = $session->get('cart', []);
        // remove product
        if(!empty($cart[$id])) {
            unset($cart[$id]);
        }
        $session->set('cart', $cart);

        return $this->redirectToRoute('cart');
    }
}
