<?php

namespace ListaShop\Api\V1\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ListaShop\Product\Models\Product;
use ListaShop\Product\Repositories\ProductRepository;
use ListaShop\Product\Http\Resources\ProductResource;

class ProductController extends Controller
{

    /**
     * @var ProductRepository
     */
    protected $product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $product)
    {
        // $this->middleware('auth:api-customer');
        $this->product = $product;
    }
    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load(['images', 'options']);

        $data = [
            'single_product' => new ProductResource($product),
            'reviews' => [],
            'related_products' => [],
        ];

        return response()->json(['status' => true, 'data' => $data]);
    }
}
