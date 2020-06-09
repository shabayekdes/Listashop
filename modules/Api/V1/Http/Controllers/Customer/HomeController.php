<?php

namespace ListaShop\Api\V1\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ListaShop\Category\Models\Category;
use ListaShop\Api\V1\Http\Resources\CategoryResource;
use ListaShop\Category\Repositories\CategoryRepository;
use ListaShop\Product\Repositories\ProductRepository;

class HomeController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $category;

    /**
     * @var ProductRepository
     */
    protected $product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $category, ProductRepository $product)
    {
        // $this->middleware('auth:api-customer');
        $this->category = $category;
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'list_categories' => CategoryResource::collection($this->category->all()),
            'popular_categories' => $this->category->getPopularCategories(),
            'feature_products' => $this->product->getFeaturedProducts(15),
        ];

        return response()->json(['status' => true, 'data' => $data]);

    }
}
