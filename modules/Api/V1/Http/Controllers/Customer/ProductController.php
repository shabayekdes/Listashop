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

        return response()->json(['status' => true, 'data' => new ProductResource($product)]);
        dd($product);
        $product = Product::with('images', 'options.option', 'options.values')->where('slug', $slug)->firstOrFail();
        // dd($product);
        $mightAlsoLike = Product::with('images')->where('slug', '!=', $slug)->get();
        return view('shop::product.index')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
        ]);
    }
}
