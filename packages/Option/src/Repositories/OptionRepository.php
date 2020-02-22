<?php

namespace Option\Repositories;

use Option\Models\Option;
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

}
