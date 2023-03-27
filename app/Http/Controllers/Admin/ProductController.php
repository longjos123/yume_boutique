<?php

namespace App\Http\Controllers\Admin;

use App\Constants\ProductConstant;
use App\Constants\ProductPropertyConstant;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ImageProductRepository;
use App\Repositories\ProductPropertyRepository;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
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

    /**
     * @var ProductPropertyRepository
     */
    protected $productPropertyRepository;

    protected $imageProductRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
        CartRepository $cartRepository,
        ProductPropertyRepository $productPropertyRepository,
        ImageProductRepository $imageProductRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->productReposity = $productRepository;
        $this->cartRepository = $cartRepository;
        $this->productPropertyRepository = $productPropertyRepository;
        $this->imageProductRepository = $imageProductRepository;
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function detail($id)
    {
        $product = $this->productReposity->getDetail([ProductConstant::INPUT_ID => $id])->first();
        $colors = $this->productPropertyRepository->getByCondition([ProductPropertyConstant::INPUT_PRODUCT_ID => $id], [ProductPropertyConstant::INPUT_COLOR_NAME, ProductPropertyConstant::INPUT_COLOR])->toArray();
        $imageProducts = $this->imageProductRepository->getByCondition([
            ProductPropertyConstant::INPUT_PRODUCT_ID => $id
        ]);
        $productProperties = $this->productPropertyRepository->getByCondition([ProductPropertyConstant::INPUT_PRODUCT_ID => $id]);
        $sizes = [];
        foreach ($productProperties as $property) {
            if (!in_array($property->size, $sizes)) {
                $sizes[] = $property->size;
            }
        }

        return view('page.product-detail', compact('product', 'colors', 'imageProducts', 'sizes'));
    }
}
