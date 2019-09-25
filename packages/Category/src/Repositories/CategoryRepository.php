<?php

namespace Category\Repositories;

use Illuminate\Container\Container as App;
use Category\Models\Category;
use Core\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
    }
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Category::class;
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

    /**
     * @param User  $user
     * @param array $data
     *
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     * @return User
     */
    public function update(array $data, $id) : Category
    {
        $category = $this->getById($id);
        // dd($data['image']);
        if($data['image']){
            $name = $data['slug'] .'.' . explode('/', explode(':', substr($data['image'], 0, strpos($data['image'], ';')))[1])[1];
            \Image::make($data['image'])->save(public_path('img/category/').$name);

            $data['image'] = $name;
        }
        $category->update($data);
        return $category;
    }

}
