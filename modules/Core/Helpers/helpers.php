<?php

if (! function_exists('upload_image')) {
    function upload_image($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);

        return route("{$resource}.show", $model);
    }
}
if (! function_exists('presentPrice')) {
    function presentPrice($price)
    {
        return '$' . number_format($price, 2);
    }
}
if (! function_exists('settings')) {

    /**
     * Get app setting stored in db.
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    function settings($key = null, $default = null)
    {
        $setting = app()->make('ListaShop\Setting\Contracts\SettingContract');

        if (is_null($key)) {
            return $setting;
        }

        return $setting->get($key, value($default));
    }
}
