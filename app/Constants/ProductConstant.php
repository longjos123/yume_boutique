<?php

namespace App\Constants;

class ProductConstant
{
    const TABLE_NAME = 'products';
    const INPUT_ID = 'id';
    const INPUT_CODE = 'code';
    const INPUT_NAME = 'name';
    const INPUT_PRICE = 'price';
    const INPUT_MANUFACTURER_ID = 'manufacturer_id';
    const INPUT_CATEGORY_ID = 'category_id';
    const INPUT_SALE = 'sale';
    const INPUT_CREATED_AT = 'created_at';
    const INPUT_DELETED_AT = 'deleted_at';

    const COLUMN_SELECT = [
      self::TABLE_NAME . '.' . self::INPUT_ID,
      self::INPUT_CODE,
      self::TABLE_NAME . '.' . self::INPUT_NAME . ' as product_name',
      self::INPUT_PRICE,
      self::INPUT_MANUFACTURER_ID,
      self::INPUT_CATEGORY_ID,
      self::INPUT_SALE,
      self::TABLE_NAME . '.' . self::INPUT_CREATED_AT . ' as product_created_at'
    ];
}
