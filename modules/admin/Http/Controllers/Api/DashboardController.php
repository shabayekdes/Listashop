<?php

namespace Admin\Http\Controllers\Api;


use App\Http\Controllers\Controller;

/**
 * Home page controller
 */
class DashboardController extends Controller
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

    }

}
