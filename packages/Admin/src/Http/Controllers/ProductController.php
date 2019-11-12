<?php

namespace Admin\Http\Controllers;

use Illuminate\Support\Str;
use Product\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Product\Http\Requests\ProductRequest;
use Product\Http\Resources\ProductResource;
use Product\Repositories\ProductRepository;


class ProductController extends Controller
{
    protected $product;

    /**
     * Product Controller constructor.
     *
     * @param ProductRepositoryInterface $product
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductResource::collection($this->product->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        return $this->product->create(array_merge($request->all(), ['sku'=> Str::random(10)]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        return new ProductResource($this->product->update($request->all(), $this->product->find($id)));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->deleteById($user->id);
        return ['message' => 'product deleted!!'];

    }
}