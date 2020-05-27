<?php

namespace ListaShop\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ListaShop\Attribute\Models\Attribute;
use ListaShop\Attribute\Models\AttributeOption;
use ListaShop\Attribute\Http\Requests\AttributeRequest;
use ListaShop\Attribute\Http\Resources\AttributeResource;
use ListaShop\Attribute\Repositories\AttributeRepository;
use ListaShop\Attribute\Http\Resources\AttributeCollection;
use ListaShop\Attribute\Http\Requests\AttributeOptionRequest;
use ListaShop\Attribute\Http\Resources\AttributeOptionResource;
use ListaShop\Attribute\Repositories\AttributeOptionRepository;

class AttributeController extends Controller
{
    protected $attribute;

    /**
     * Attribute Controller constructor.
     *
     * @param AttributeRepository $attribute
     * @param AttributeOptionRepository $option
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
        if (request('show')) {
            return new AttributeCollection($this->attribute->all());
        }
        return AttributeResource::collection($this->attribute->with('values')->paginate());
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

        return response()->json(['data' => $attr], 200);
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
    public function storeOption(AttributeOptionRequest $request, $id)
    {
        return $this->attribute->withCreate($id, 'options', $request->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOption(AttributeOptionRequest $request, AttributeOption $option)
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
