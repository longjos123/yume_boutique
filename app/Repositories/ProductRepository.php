<?php

namespace App\Repositories;

use App\Constants\CategoryConstant;
use App\Constants\ImageProductConstant;
use App\Constants\ManufacturerConstant;
use App\Constants\ProductConstant;
use App\Models\Product;
use App\Repositories\Base\BaseRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function getModel()
    {
        return Product::class;
    }

    /**
     * @param array $condition
     * @param $limit
     * @param array $column
     * @return void
     */
    public function getLimit(array $condition = [], $limit, array $column = ['*'])
    {
        $query = $this->model->newQuery();
        $query->select($column)->with('imageProduct')
              ->whereNull(ProductConstant::INPUT_DELETED_AT);
        $query->leftJoin(
                CategoryConstant::TABLE_NAME,
                ProductConstant::TABLE_NAME . '.' . ProductConstant::INPUT_CATEGORY_ID,
                CategoryConstant::TABLE_NAME . '.' . CategoryConstant::INPUT_ID
            )->leftJoin(
                ManufacturerConstant::TABLE_NAME,
                ProductConstant::TABLE_NAME . '.' . ProductConstant::INPUT_MANUFACTURER_ID,
                ManufacturerConstant::TABLE_NAME . '.' . ManufacturerConstant::INPUT_ID
            );
        if (isset($condition[ProductConstant::INPUT_SALE])) {
            $query->orderByDesc(ProductConstant::INPUT_SALE);
        }

        return $query->get();
    }
}
