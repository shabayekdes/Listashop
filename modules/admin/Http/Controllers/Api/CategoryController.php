<?php

namespace Admin\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Category\Http\Requests\CategoryRequest;
use Category\Http\Resources\CategoryResource;
use Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $category;

    /**
     * Category Controller constructor.
     *
     * @param CategoryRepositoryInterface $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request('show')){
            return CategoryResource::collection($this->category->all());
        }
        return CategoryResource::collection($this->category->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        return $this->category->create($request->all());
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
    public function update(CategoryRequest $request, $id)
    {
        if($request->image){
            $name = $request->slug.'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            \Image::make($request->image)->save(public_path('img/category/').$name);
            $request->merge(['image' => $name]);
        }

        return $this->category->updateById($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->deleteById($id);
        return ["message" => "Category delete!!"];
    }
}