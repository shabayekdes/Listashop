<?php

namespace ListaShop\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ListaShop\Setting\Repositories\SettingGroupRepository;
use ListaShop\Setting\Http\Resources\SettingGroupResource;

class SettingController extends Controller
{
    protected $settingGroup;

    /**
     * Attribute Controller constructor.
     *
     * @param SettingGroupRepository $settingGroup
     */
    public function __construct(SettingGroupRepository $settingGroup)
    {
        $this->settingGroup = $settingGroup;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SettingGroupResource::collection($this->settingGroup->whereSettingGroupIDNull());
    }
}
