<?php

namespace ListaShop\Shop\Http\Controllers;

use App\Http\Controllers\Controller;
use ListaShop\Customer\Models\CustomerAddress;
use \Illuminate\Http\Response;
use \Illuminate\Http\Request;

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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CustomerAddress  $address
     * @return Response
     */
    public function update(Request $request, CustomerAddress $address)
    {
        $request->validate([
            'address' => 'required'
        ]);

        $customer_id = auth('customer')->user()->id;

        abort_if($customer_id != $address->customer_id, 404);

        $address->update($request->all());

        return redirect()->back();
    }

    /**
     * Store resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'postcode' => 'required'
        ]);

        $customer = auth('customer')->user();

        $customer->addresses()->create($request->all());

        return redirect()->back();
    }

    /**
     * Delete resource in storage.
     *
     * @param CustomerAddress  $address
     * @return Response
     */
    public function destroy(CustomerAddress $address)
    {
        $customer_id = auth('customer')->user()->id;

        abort_if($customer_id != $address->customer_id, 404);

        $address->delete();

        return redirect()->back();
    }

}
