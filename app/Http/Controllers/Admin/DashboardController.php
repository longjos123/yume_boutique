<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;

class DashboardController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var ProductRepository
     */
    protected $productReposity;
    /**
     * @var CartRepository
     */
    protected $cartRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        CartRepository $cartRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productReposity = $productRepository;
        $this->cartRepository = $cartRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getByCondition([], ['*']);
        dd($categories);
    }
}
