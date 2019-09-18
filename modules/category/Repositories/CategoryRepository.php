<?php

namespace Category\Repositories;

use Category\Models\Category;
use Core\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param  User  $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new category record in the database with image.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        // dd($data['image']);
        if($data['image']){
            $name = $data['slug'] .'.' . explode('/', explode(':', substr($data['image'], 0, strpos($data['image'], ';')))[1])[1];
            \Image::make($data['image'])->save(public_path('img/category/').$name);

            $data['image'] = $name;
        }
        return $this->model->create($data);
    }

}