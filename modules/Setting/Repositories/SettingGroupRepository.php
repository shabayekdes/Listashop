<?php

namespace ListaShop\Setting\Repositories;

use ListaShop\Core\Eloquent\BaseRepository;
use Illuminate\Container\Container as App;
use ListaShop\Setting\Models\SettingGroup;

class SettingGroupRepository extends BaseRepository
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
        return SettingGroup::class;
    }

}
