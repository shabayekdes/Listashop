<?php

namespace Attribute\Repositories;

use Core\Eloquent\BaseRepository;
use Attribute\Models\AttributeValue;
use Illuminate\Container\Container as App;

class AttributeValueRepository extends BaseRepository
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
        return AttributeValue::class;
    }
    /**
     * Create a new option record in the database.
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
    public function update(array $data, $value)
    {
        $value->update($data);
        return $value;
    }
}
