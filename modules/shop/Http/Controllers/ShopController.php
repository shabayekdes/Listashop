<?php

namespace Shop\Http\Controllers;

use Category\Models\Category;
use App\Http\Controllers\Controller;

/**
 * Home page controller
 */
class ShopController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->_config = request('_config');
    }

    public function index()
    {

        $categories = Category::all();

        return view($this->_config['view'])->with('categories', $categories);

    }

}
