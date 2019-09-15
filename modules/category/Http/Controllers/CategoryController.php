<?php

namespace Category\Http\Controllers;

use App\Http\Controllers\Controller;
use Category\Http\Resources\CategoryResource;
use Category\Repositories\CategoryRepository;

/**
 * Category page controller
 */
class CategoryController extends Controller
{
    protected $category;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        return CategoryResource::collection($this->category->all());
    }


}
