<?php

namespace ListaShop\Category\Repositories;

use Illuminate\Support\Str;
use ListaShop\Category\Models\Category;
use ListaShop\Core\Eloquent\BaseRepository;
use Illuminate\Support\Facades\File;
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
        $category = $this->model->create($data);

        return $this->uploadThumb($category);
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
    public function update(array $data, $category): Category
    {
        if (isset($data['image']) && File::exists('img/category/' . $category->image)) {
            File::delete('img/category/' . $category->image);
        }
        $category->update($this->storeImage($data));
        return $category;
    }

    private function uploadThumb($category)
    {
        if (request()->has('image')) {
            // Get filename with the extension
            $filenameWithExt = request('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = request('image')->getClientOriginalExtension();

            $fileNameToStore = 'category-' . $category->id . '.' . $extension;
            $path = request('image')->storeAs('public/categories',  $fileNameToStore);
            $fileNameToStore = Str::replaceFirst('public/', '', $path);
            $category->update([
                'image' => $fileNameToStore
            ]);
        }
        return $category;
    }
}
