<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Base\BaseRepository;

class ProductRepository extends BaseRepository implements IProductRepository
{
    public function getModel()
    {
        return Product::class;
    }
}
