<?php

namespace Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Attribute\Models\AttributeOption;
use Attribute\Http\Requests\AttributeOptionRequest;
use Attribute\Http\Resources\AttributeOptionResource;
use Attribute\Repositories\AttributeOptionRepository;


class AttributeOptionController extends Controller
{
    protected $option;

    /**
     * Attribute Option Controller constructor.
     *
     * @param AttributeOptionRepositoryInterface $option
     */
    public function __construct(AttributeOptionRepository $option)
    {
        $this->option = $option;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AttributeOptionResource::collection($this->option->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeOptionRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeOption $option)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeOption $option)
    {


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