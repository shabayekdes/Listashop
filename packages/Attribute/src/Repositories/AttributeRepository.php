<?php

namespace Attribute\Repositories;

use Attribute\Models\Attribute;
use Core\Eloquent\BaseRepository;
use Illuminate\Container\Container as App;
use Attribute\Http\Resources\AttributeResource;

class AttributeRepository extends BaseRepository
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
        return Attribute::class;
    }
    /**
     * Create a new attribute record in the database.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
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
    public function update(array $data, $attribute)
    {
        $attribute->update($data);
        return $attribute;
    }
}