<?php

use Symfony\Component\HttpFoundation\Session\SessionInterface;

namespace App\Services;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductRepository;

class CartService {

    protected $session;
    protected $productRepository;


    public function __construct(SessionInterface $session, ProductRepository $productRepository)
    {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }


    public function add($id) {
        // get session cart wich is an empty table
        $cart = $this->session->get('cart', []);
        if(!empty($cart[$id])) {
            $cart[$id]++;
        }
        else {
            $cart[$id] = 1;  
        }
        $this->session->set('cart', $cart);    
    }


    public function remove($id) {
        $cart = $this->session->get('cart', []);
        // remove product
        if(!empty($cart[$id])) {
            unset($cart[$id]);
        }
        $this->session->set('cart', $cart);
    }

    public function getFullCart() {
         // get session cart wich is an empty table
         $cart = $this->session->get('cart', []);
         $cartWithData = [];
 
         foreach($cart as $id => $quantity) {
             $cartWithData[] = [
                 'product' => $this->productRepository->find($id),
                 'quantity' => $quantity
             ];
         }
         return $cartWithData;
 
    }

    public function getTotal() {
        $total = 0;

        foreach($this->getFullCart() as $product) {
            $total += $product['product']->getPrice() * $product['quantity'];
        }

        return $total;
    }
}

