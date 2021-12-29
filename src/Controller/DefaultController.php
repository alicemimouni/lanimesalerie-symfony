<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\Category;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig',  [
            'controller_name' => 'DefaultController',
        ]);
    }

    // NAVBAR
    // ######
     /**
     * @Route("/menu", name="category_menu", methods={"GET"})
     * 
     */
    public function menuCategories(CategoryRepository $categoryRepository): Response
    {
        return $this->render('parts/header.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    // ALL PRODUCTS BY CATEGORY
    // #########################
    /**
     * @Route("/categorie-{category}", name="products_by_category", methods={"GET"})
     */
    public function findByCategory($category, CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findBy(['id' => $category]);
        return $this->render('product/product_by_category.html.twig', [
            'categories' => $categories
        ]);
    } 

    // DETAIL ONE PRODUCT
    // ####################
    /**
     * @Route("/article-{product}", name="detail_product", methods={"GET"})
     */
    public function getOneProduct(Product $product): Response
    {
        return $this->render('product/detail_product.html.twig', [
            'product' => $product,
        ]);
    }

    // GET ALL PRODUCTS
    // ################
    /**
     * @Route("/produits", name="all_products", methods={"GET"})
     * 
     */
    public function allProducts(ProductRepository $productRepository): Response
    {
        return $this->render('product/all_products.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

}
