<?php

namespace ListaShop\Setting;

use ListaShop\Setting\Contracts\SettingContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class SettingStorage implements SettingContract
{
    /**
     * Cache key.
     *
     * @var string
     */
    protected $settingsCacheKey = 'app_settings';

    /**
     * {@inheritdoc}
     */
    public function all($fresh = false)
    {
        if ($fresh) {
            return $this->modelQuery()->pluck('value', 'setting_key');
        }

        return Cache::rememberForever($this->getSettingsCacheKey(), function () {
            return $this->modelQuery()->pluck('value', 'setting_key');
        });
    }

    /**
     * {@inheritdoc}
     */
    public function get($key, $default = null, $fresh = false)
    {
        return $this->all($fresh)->get($key, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return $this->all()->has($key);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($key)
    {
        $deleted = $this->getSettingModel()->where('setting_key', $key)->delete();

        $this->flushCache();

        return $deleted;
    }

    /**
     * {@inheritdoc}
     */
    public function flushCache()
    {
        return Cache::forget($this->getSettingsCacheKey());
    }

    /**
     * Get settings cache key.
     *
     * @return string
     */
    protected function getSettingsCacheKey()
    {
        return $this->settingsCacheKey;
    }

    /**
     * Get settings eloquent model.
     *
     * @return Builder
     */
    protected function getSettingModel()
    {
        return app('\ListaShop\Setting\Models\Setting');
    }

    /**
     * Get the model query builder.
     *
     * @return Builder
     */
    protected function modelQuery()
    {
        return $this->getSettingModel();
    }

}