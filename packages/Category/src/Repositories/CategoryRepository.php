<?php

namespace Category\Repositories;

use Category\Models\Category;
use Core\Eloquent\BaseRepository;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Container\Container as App;

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
        return $this->model->create($this->storeImage($data));
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
    public function update(array $data, $category) : Category
    {
        if (isset($data['image']) && File::exists('img/category/'. $category->image)) {
            File::delete('img/category/'. $category->image);
        }
        $category->update($this->storeImage($data));
        return $category;
    }

    private function storeImage($data)
    {
        if (isset($data['image'])) {

            $name = $data['slug'] .'.' . explode('/', explode(':', substr($data['image'], 0, strpos($data['image'], ';')))[1])[1];
            Image::make($data['image'])->save(public_path('img/category/').$name);

            $data['image'] = $name;

        }
        return $data;
    }

}