<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Repositories\Base\BaseRepository;

class CartRepository extends BaseRepository implements ICartRepository
{
    public function getModel()
    {
        return Cart::class;
    }
}
