<?php

namespace App\Constants;
class CategoryConstant
{
    const TABLE_NAME = 'categories';

    const INPUT_ID = 'id';
    const INPUT_NAME = 'name';
    const INPUT_ICON = 'icon';

    const COLUMN_SELECT = [
        self::TABLE_NAME . '.' . self::INPUT_NAME . ' as category_name',
        self::TABLE_NAME . '.' . self::INPUT_ICON . ' as category_icon'
    ];
}
