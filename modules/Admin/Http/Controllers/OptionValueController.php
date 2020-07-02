<?php

namespace ListaShop\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ListaShop\Option\Models\OptionValue;

class OptionValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = OptionValue::create($request->all());
        return $value;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OptionValue  $optionValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(OptionValue $optionValue)
    {
        $optionValue->delete();
        return response()->json(["status" => true]);
    }
}
