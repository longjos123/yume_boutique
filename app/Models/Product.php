<?php

namespace App\Models;

use App\Constants\ImageProductConstant;
use App\Constants\ProductConstant;
use Illuminate\Database\Eloquent\Model;

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

    public function imageProduct()
    {
        return $this->belongsTo(ImageProduct::class,ProductConstant::INPUT_ID, ImageProductConstant::INPUT_PRODUCT_ID);
    }
}
