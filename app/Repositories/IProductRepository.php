<?php

namespace App\Repositories;

interface IProductRepository
{
    public function getLimit(array $condition = [], $limit, array $column = SELECT_ALL);
}
