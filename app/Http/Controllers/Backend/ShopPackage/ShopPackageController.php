<?php

namespace App\Http\Controllers\Backend\ShopPackage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopPackage\ShopPackageCreateRequest;
use App\Http\Requests\ShopPackage\ShopPackageDeleteRequest;
use App\Http\Requests\ShopPackage\ShopPackageGetUpdateRequest;
use App\Http\Requests\ShopPackage\ShopPackageGetDetailRequest;
use App\Http\Requests\ShopPackage\ShopPackageUpdateRequest;
use App\Repositories\ShopPackage\ShopPackageRepository;

class ShopPackageController extends Controller
{
    /**
     * ShopPackage repository
     * @var object
     */
    protected $shoppackage;

    public function __construct(ShopPackageRepository $shoppackage)
    {
        $this->shoppackage = $shoppackage;
    }
    /**
     * get ShopPackage show list
     * @return view
     */
    public function getShopPackageList()
    {
        return $this->shoppackage->getList();
    }

    /**
     * get ShopPackage form create data
     * @return view
     */
    public function getFormShopPackageCreate()
    {
        return $this->shoppackage->getCreateForm();
    }

    /**
     * get ShopPackage form update data
     * @param  GetUpdateShopPackageRequest $request
     * @return view
     */
    public function getFormShopPackageUpdate(ShopPackageGetUpdateRequest $request)
    {
        return $this->shoppackage->getUpdateForm($request->id);
    }

    /**
     * get ShopPackage form detail data
     * @return [type] [description]
     */
    public function getShopPackageDetail(ShopPackageGetDetailRequest $request)
    {
        return $this->members->getFormDetail($request->id);
    }

    /**
     * submit create ShopPackage data to api
     * @param  CreateShopPackageRequest $request
     * @return redirect back with flash success
     */
    public function submitFormShopPackageCreate(ShopPackageCreateRequest $request)
    {
        $this->shoppackage->createDataApi($request->all());
        return redirect()->route('shoppackage.view')
            ->withFlashSuccess('create shoppackage data success');
    }

    /**
     * submit update ShopPackage data to api
     * @param  UpdateShopPackageRequest $request
     * @return redirect back with flash success
     */
    public function submitFormShopPackageUpdate(ShopPackageUpdateRequest $request)
    {
        $this->shoppackage->updateDataApi($request->id, $request->all());
        return redirect()->route('shoppackage.view')
            ->withFlashSuccess('update shoppackage data success');
    }

    /**
     * submit delete ShopPackage data to api
     * @param  DeleteShopPackageRequest $request
     * @return redirect back with flash success
     */
    public function submitFormShopPackageDelete(ShopPackageDeleteRequest $request)
    {
        $this->shoppackage->deleteDataApi($request->id);
        return redirect()->route('shoppackage.view')
            ->withFlashSuccess('delete shoppackage data success');
    }
}
