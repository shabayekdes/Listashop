<?php

namespace Admin\Http\Controllers;

use Illuminate\Http\Request;
use Attribute\Models\Attribute;
use App\Http\Controllers\Controller;
use Attribute\Models\AttributeOption;
use Attribute\Http\Requests\AttributeRequest;
use Attribute\Http\Resources\AttributeResource;
use Attribute\Repositories\AttributeRepository;
use Attribute\Http\Resources\AttributeCollection;
use Attribute\Http\Requests\AttributeOptionRequest;
use Attribute\Http\Resources\AttributeOptionResource;
use Attribute\Repositories\AttributeOptionRepository;

class AttributeController extends Controller
{
    protected $attribute;
    protected $option;

    /**
     * Attribute Controller constructor.
     *
     * @param AttributeRepository $attribute
     * @param AttributeOptionRepository $option
     */
    public function __construct(AttributeRepository $attribute, AttributeOptionRepository $option)
    {
        $this->attribute = $attribute;
        $this->option = $option;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('show')){
            return new AttributeCollection($this->attribute->all());
        }
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
    public function show(Attribute $attribute)
    {
        $collection = collect($attribute);

        $attr = $collection->put('options', $attribute->options()->get());

        return response()->json(['data' => $attr], 200 );
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
        $attr =  $this->attribute->update($request->all(), $attribute);
        return new AttributeResource($attr);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attr = $this->attribute->delete($id);
        return ['message' => 'attribute deleted!!'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOption(AttributeOptionRequest $request, $id )
    {
        return $this->attribute->withCreate($id, 'options',$request->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOption(AttributeOptionRequest $request, AttributeOption $option )
    {
        $attr_option =  $this->option->update($request->all(), $option);
        return new AttributeOptionResource($attr_option);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyOption($id)
    {
        $this->option->delete($id);
        return ['message' => 'option deleted!!'];
    }
}
