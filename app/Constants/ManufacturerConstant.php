<?php

namespace App\Constants;
class ManufacturerConstant
{
    const TABLE_NAME = 'manufacturers';

    const INPUT_ID = 'id';
    const INPUT_NAME = 'name';
    const INPUT_IMAGE = 'image';

    const COLUMN_SELECT = [
        self::TABLE_NAME . '.' . self::INPUT_NAME . ' as manufacturer_name',
        self::TABLE_NAME . '.' . self::INPUT_IMAGE . ' as manufacturer_image'
    ];
}
