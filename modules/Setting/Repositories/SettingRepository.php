<?php

namespace ListaShop\Setting\Repositories;

use ListaShop\Core\Eloquent\BaseRepository;
use Illuminate\Container\Container as App;
use ListaShop\Setting\Models\Setting;
use DB;

class SettingRepository extends BaseRepository
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
        return Setting::class;
    }

    /**
     * Update a settings bulk records in the database.
     *
     * @param array $data
     *
     */
    public function updateBulkSettings(array $values)
    {

        $caseString = 'CASE setting_key';
        $keys = '';
        foreach ($values as $key => $value) {
            $caseString .= " when '$key' then '$value'";
            $keys .= " '$key',";
        }
        $keys = trim($keys, ',');

        DB::update("update settings set value = $caseString else value end where setting_key in ($keys)");
    }

}
