<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function search(ProductRepository $productRepository, Request $request): Response
    {
        $form =  $this->createForm(SearchType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $filtres = $form->getData();
            $products = $productRepository->search($filtres);
        }
        else {
            // $products = $productRepository->findAll();
            $products = [];
        }
        //return all products
        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'products' => $products
        ]);
    }
}
