<?php

namespace App\Services;

use App\Repositories\Product\ProductRepositoryInterface;

class ProductService extends BaseService
{
    /**
     * @param ProductRepositoryInterface $repository
     */
    public function __construct(ProductRepositoryInterface $repository)
    {
        parent::__construct($repository);
    }

}
