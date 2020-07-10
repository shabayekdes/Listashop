<?php

namespace ListaShop\Product\Repositories;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use ListaShop\Product\Models\Product;
use ListaShop\Product\Models\ProductOption;
use ListaShop\Core\Eloquent\BaseRepository;
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
        $this->uploadImages($product);

        if($data['type'] == 'configurable'){
            $options = json_decode($data['options'], true);

            foreach ($options as $option) {

                $productOption = ProductOption::create([
                    'option_id' => $option['id'],
                    'product_id' =>$product->id,
                    'is_required' => Arr::has($option, 'is_required') ? $option['is_required'] : false
                ]);

                $keyed = collect($option['values'])->mapWithKeys(function ($item) {
                    return [$item['id'] => [ 'price' => $item['price'], 'price_type' => $item['price_type'] ]];
                })->all();

                $productOption->values()->attach($keyed);
            }

        }

        return $product;
    }
    /**
     * Update a product record in the database with thumb.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(array $data, $product)
    {
        Arr::forget($data, 'thumbnail');
        $product->update($data);
        $this->uploadImages($product);

        if($data['type'] == 'configurable'){
            $options = json_decode($data['options'], true);

            foreach ($options as $option) {

                $productOption = ProductOption::firstOrCreate([
                    'option_id' => $option['id'],
                    'product_id' =>$product->id,
                    'is_required' => Arr::has($option, 'is_required') ? $option['is_required'] : false
                ]);

                $keyed = collect($option['values'])->mapWithKeys(function ($item) {
                    return [$item['id'] => [ 'price' => $item['price'], 'price_type' => $item['price_type'] ]];
                })->all();

                $productOption->values()->sync($keyed);
            }

        }

        return $product;
    }
    /**
     * @param mixed $product
     * @param array $permutation
     * @param array $data
     * @return mixed
     */
    public function createVariant($variant, $product, $data)
    {
        $attributes_ids = Arr::pluck($variant['attributes'], 'id');

        $data = [
            "sku" => $product->sku . '-variant-' . implode('-', $attributes_ids),
            "name" => "",
            "price" => $variant['price'] ?? $data['price'],
            "cost" => $variant['cost'] ?? $data['cost'],
        ];
        if (Arr::has($variant, 'quantity') || Arr::has($data, 'quantity')) {
            $data['quantity'] = $variant['quantity'] ?? $data['quantity'];
        }

        $productVariant = $product->children()->create([
            'type' => 'product-variant',
            'sku' => $data['sku'],
            'slug' => $product->slug,
            'category_id' => $product->category_id,
        ]);

        $attributes_ids = Arr::pluck($variant['attributes'], 'id');
        $productVariant->options()->attach($attributes_ids);
        $this->productFlat->createProductFlat($data, $productVariant);
    }
    private function uploadImages($product)
    {
        if (request()->has('images') && !empty(request()->get('images'))) {

            foreach (request('images') as $key => $image) {
                // Get filename with the extension
                $filenameWithExt = $image->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $image->getClientOriginalExtension();
                if ($key == 'thumb') {

                    if (Storage::exists('public/' . $product->thumbnail)) {
                        Storage::delete('public/' . $product->thumbnail);
                    }

                    $fileNameToStore = 'product-' . $product->id . '.' . $extension;
                    $path = $image->storeAs('public/products/' . $product->id,  $fileNameToStore);
                    $fileNameToStore = Str::replaceFirst('public/', 'storage/', $path);
                    $productImage = $product->update([
                        'thumbnail' => $fileNameToStore
                    ]);
                } else {
                    // Filename to store
                    $fileNameToStore = $filename . '.' . $extension;
                    // Upload Image
                    $path = $image->store('public/products/' . $product->id);

                    $fileNameToStore = Str::replaceFirst('public/', '', $path);

                    $productImage = $product->images()->create([
                        'path' => $fileNameToStore
                    ]);
                    $img = Image::make(public_path('storage/' . $productImage->path))->fit(130, 150, null, 'center');
                    $img->save();
                }
            }
        }
        return $product;
    }
}
