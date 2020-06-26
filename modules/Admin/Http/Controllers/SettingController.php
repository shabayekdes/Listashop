<?php

namespace ListaShop\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ListaShop\Setting\Repositories\SettingGroupRepository;
use ListaShop\Setting\Repositories\SettingRepository;
use ListaShop\Setting\Http\Resources\SettingGroupResource;

class SettingController extends Controller
{
    protected $settingGroup;
    protected $settingRepository;

    /**
     * Attribute Controller constructor.
     *
     * @param SettingGroupRepository $settingGroup
     * @param SettingRepository $settingRepository
     */
    public function __construct(SettingGroupRepository $settingGroup, SettingRepository $settingRepository)
    {
        $this->settingGroup = $settingGroup;
        $this->settingRepository = $settingRepository;
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request)
    {
        $this->settingRepository->updateBulkSettings($request->all());

        return SettingGroupResource::collection($this->settingGroup->whereSettingGroupIDNull());
    }
}
