<?php

namespace ListaShop\Api\V1\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ListaShop\Category\Models\Category;
use ListaShop\Api\V1\Http\Resources\CategoryResource;
use ListaShop\Category\Repositories\CategoryRepository;

class HomeController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $category;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $category)
    {
        // $this->middleware('auth:api-customer');
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => CategoryResource::collection($this->category->all())]);
    }
}
