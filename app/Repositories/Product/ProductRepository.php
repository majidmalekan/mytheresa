<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    /**
     * @param Request $request
     * @param $perPage
     * @return LengthAwarePaginator
     */
    public function read($request, $perPage): LengthAwarePaginator
    {
        $products = $this->model->query();
        $products->when($request->has('category'), function ($query) use ($request) {
            return $query->where('category', 'LIKE', "%{$request->get('category')}%");
        });
        $products->when($request->has('priceLessThan'), function ($query) use ($request) {
            return $query->where('price', '<=', $request->get('priceLessThan'));
        });
        return $products->paginate($perPage, '*', '', $request->query('page'));
    }
}
