<?php

namespace Product\Repositories;

use Illuminate\Support\Str;
use Product\Models\Product;
use Core\Eloquent\BaseRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Container\Container as App;

class ProductRepository extends BaseRepository
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
        return Product::class;
    }
    /**
     * Create a new product record in the database with thumb.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        $product = $this->model->create($data);

        return $this->uploadGallery($product);

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
    public function update(array $data, $product) : Product
    {
        if (isset($data['thumbnail']) && Storage::exists('img/products/'. $product->thumbnail)) {
            Storage::delete('img/products/'. $product->thumbnail);
        }
        $product->update($this->storeImage($data));
        return $product;
    }

    private function uploadGallery($product)
    {
        if (request()->has('images')) {
            foreach (request('images') as $key => $image) {
                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                if($key == 'thumb'){

                    $fileNameToStore= 'product-' . $product->id .'.'.$extension;
                    $path = $image->storeAs('public/products/' . $product->id,  $fileNameToStore);
                    $fileNameToStore = Str::replaceFirst('public/', '', $path);
                    $productImage = $product->update([
                        'thumbnail' => $fileNameToStore
                    ]);

                }else{
                    // Filename to store
                    $fileNameToStore= $filename.'.'.$extension;
                    // Upload Image
                    $path = $image->store('public/products/' . $product->id);

                    $fileNameToStore = Str::replaceFirst('public/', '', $path);

                    $productImage = $product->images()->create([
                        'path' => $fileNameToStore
                    ]);
                    $img = Image::make(public_path('storage/'.$productImage->path))->fit(130, 150, null, 'center');
                    $img->save();
                }

            }
        }
        return $product;
    }
}
