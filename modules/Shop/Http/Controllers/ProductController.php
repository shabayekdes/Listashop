<?php

namespace ListaShop\Shop\Http\Controllers;

use ListaShop\Product\Models\Product;
use ListaShop\Category\Models\Category;
use App\Http\Controllers\Controller;
use ListaShop\Product\Repositories\ProductRepository;
use ListaShop\Category\Repositories\CategoryRepository;

/**
 * Home page controller
 */
class ProductController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $product;
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $category;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepository $product, CategoryRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()->take(12)->get();
        $pagination = 9;
        $categories = $this->category->all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }

        $products = $products->paginate($pagination);

        return view('shop::product.index')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }
}
