<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OrderRepository;
use DateTime;
use Symfony\Component\Validator\Constraints\Date;


class StatsController extends AbstractController
{
    /**
     * @Route("/api/stats", name="stats")
     */

    // RECUPERE LE MONTANT TOTAL DES VENTES DU JOUR
    public function totalSalesDay(OrderRepository $orderRepository) {
        $orders = $orderRepository->findBy(['orderDate' => new DateTime()]);
        $prices = array();
        
        foreach($orders as $order) {
            $products = $order->getCart();
            foreach($products as $product) {
                array_push($prices, $product->getPrice());
            }
        }
        return array_sum($prices);
    }
}