<?php

namespace App\Repositories;

use App\Models\ProductProperty;
use App\Repositories\Base\BaseRepository;

class ProductPropertyRepository extends BaseRepository implements IProductPropertyRepository
{
    public function getModel()
    {
        return ProductProperty::class;
    }

//    public function getSize($id)
//    {
//        $query = $this->model->newQuery()
//    }
}
