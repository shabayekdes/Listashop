<?php

namespace ListaShop\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use ListaShop\Customer\Models\CustomerAddress;

/**
 * My address page controller
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = auth('customer')->user()->addresses()->get();
        return view('shop::account.address', compact('addresses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  CustomerAddress  $address
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerAddress $address)
    {

    }

}
