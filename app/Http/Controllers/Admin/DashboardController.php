<?php

namespace App\Http\Controllers\Admin;

use App\Constants\CategoryConstant;
use App\Constants\ImageProductConstant;
use App\Constants\ManufacturerConstant;
use App\Constants\ProductConstant;
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
        $categories = $this->categoryRepository->getByCondition([])->toArray();
        $condition = [
          ProductConstant::INPUT_SALE => SORT_DESC
        ];
        $columnSelect = array_merge(
            ProductConstant::COLUMN_SELECT,
            CategoryConstant::COLUMN_SELECT,
            ManufacturerConstant::COLUMN_SELECT
        );
        $products = $this->productReposity->getLimit($condition, 9, $columnSelect)->toArray();

        return view('page.index', compact('categories', 'products'));
    }

    public function detailProduct($id)
    {
        $product = $this->productReposity->getDetail([ProductConstant::INPUT_ID => $id])->first();
        $product->load('imageProduct');
        $product = $product->toArray();

        return view('modal.product-detail', compact('product'));
    }
}
