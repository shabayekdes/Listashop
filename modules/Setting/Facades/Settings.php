<?php

namespace ListaShop\Setting\Facades;

use Illuminate\Support\Facades\Facade;

class Setting extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'ListaShop\Setting\Setting\SettingStorage';
    }
}
