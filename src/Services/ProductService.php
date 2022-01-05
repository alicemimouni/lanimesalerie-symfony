<?php

use App\Repository\ProductRepository;

namespace App\Services;

use App\Repository\ProductRepository;

class ProductService {

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll() {

        return $this->productRepository->findAll();
    }
}