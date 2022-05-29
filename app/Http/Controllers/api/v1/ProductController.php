<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\IndexProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService=$productService;
    }

    /**
     * Show All Products With Pagination With Filter
     * @param IndexProductRequest $request
     * @return JsonResponse
     */
    public function index(IndexProductRequest $request): JsonResponse
    {
        return success('Show Products Successfully.', $this->productService->read($request));
    }
}
