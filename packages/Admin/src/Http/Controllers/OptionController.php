<?php

namespace Admin\Http\Controllers;

use Option\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Option\Http\Requests\OptionRequest;
use Option\Http\Resources\OptionResource;
use Option\Repositories\OptionRepository;
use Option\Http\Resources\OptionCollection;


class OptionController extends Controller
{
    protected $option;

    /**
     * Option Controller constructor.
     *
     * @param OptionRepository $option
     */
    public function __construct(OptionRepository $option)
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
        return new OptionCollection($this->option->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        return $this->option->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        return response()->json(["option" => $option, "values" => $option->values()->get() ]);
        // return new OptionResource($option);
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
        $option = $this->option->update($request->all(), $id);
        return response()->json(["option" => $option]);

        // return new OptionResource($this->option->update($request->all(), $id));
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
