<?php

namespace Shop\Http\Controllers;


use App\Http\Controllers\Controller;

/**
 * Checkout page controller
 */
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shop::checkout.index');
    }


}