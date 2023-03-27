<?php

namespace App\Models;

use App\Constants\ImageProductConstant;
use App\Constants\ProductConstant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'code',
        'name',
        'price',
        'manufacturer_id',
        'category_id',
    ];

    /**
     * @return HasMany
     */
    public function imageProduct()
    {
        return $this->hasMany(ImageProduct::class);
    }
}
