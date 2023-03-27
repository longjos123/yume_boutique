<?php

namespace App\Repositories;

use App\Models\ImageProduct;
use App\Repositories\Base\BaseRepository;

class ImageProductRepository extends BaseRepository implements IImageProductRepository
{
    public function getModel()
    {
        return ImageProduct::class;
    }
}
