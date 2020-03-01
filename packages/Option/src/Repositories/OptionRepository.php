<?php

namespace Option\Repositories;

use Option\Models\Option;
use Illuminate\Support\Str;
use Core\Eloquent\BaseRepository;
use Illuminate\Container\Container as App;

class OptionRepository extends BaseRepository
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
        return Option::class;
    }
        /**
     * Create a new option record in the database with values.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        $data['option']['key'] = Str::slug($data['option']['name']);
        $product = $this->model->create($data['option']);
        $product->values()->createMany($data['values']);
        return $product;
    }

}
