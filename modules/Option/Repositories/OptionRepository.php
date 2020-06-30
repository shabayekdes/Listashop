<?php

namespace ListaShop\Option\Repositories;

use ListaShop\Option\Models\Option;
use Illuminate\Support\Str;
use ListaShop\Core\Eloquent\BaseRepository;
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
        $data['code'] = Str::slug($data['name']);
        $option = $this->model->create($data);
        $option->values()->createMany($data['values']);
        return $option;
    }
    /**
     * Update a new option record in the database with values.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update(array $data, $id)
    {
        $data['code'] = Str::slug($data['name']);
        $option = $this->model->find($id);
        $option->update($data);

        return $option;
    }
}
