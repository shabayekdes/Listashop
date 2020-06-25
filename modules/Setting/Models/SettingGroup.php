<?php

namespace ListaShop\Setting\Models;

use Illuminate\Database\Eloquent\Model;

class SettingGroup extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the comments for the blog post.
     */
    public function settingGroups()
    {
        return $this->hasMany(SettingGroup::class)->with('settings');
    }

    /**
     * Get the comments for the blog post.
     */
    public function childrenSettingGroups()
    {
        return $this->hasMany(SettingGroup::class)->with('settings');
    }

    /**
     * Get the comments for the blog post.
     */
    public function settings()
    {
        return $this->hasMany(Setting::class);
    }
}
