<?php

namespace Admin\Http\Controllers;

use Illuminate\Http\Request;
use Attribute\Models\Attribute;
use App\Http\Controllers\Controller;
use Attribute\Http\Requests\AttributeRequest;
use Attribute\Http\Resources\AttributeResource;
use Attribute\Repositories\AttributeRepository;

class AttributeController extends Controller
{
    protected $attribute;

    /**
     * Attribute Controller constructor.
     *
     * @param AttributeRepositoryInterface $attribute
     */
    public function __construct(AttributeRepository $attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AttributeResource::collection($this->attribute->with('options')->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        return $this->attribute->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        return $this->attribute->update($request->all(), $attribute);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
