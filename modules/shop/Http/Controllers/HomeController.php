<?php

namespace Shop\Http\Controllers;

use Shop\Http\Controllers\Controller;

/**
 * Home page controller
 */
class HomeController extends Controller
{
    public function index()
    {
        return view('shop::home.index');
    }

}
