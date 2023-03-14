<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Base\BaseRepository;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    public function getModel()
    {
        return Category::class;
    }
}
