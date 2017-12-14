<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopCreateRequest;
use App\Http\Requests\Shop\ShopDeleteRequest;
use App\Http\Requests\Shop\ShopGetUpdateRequest;
use App\Http\Requests\Shop\ShopGetDetailRequest;
use App\Http\Requests\Shop\ShopUpdateRequest;
use App\Repositories\Shop\ShopRepository;

class ShopController extends Controller
{
    /**
     * Shop repository
     * @var object
     */
    protected $shop;

    public function __construct(ShopRepository $shop)
    {
        $this->shop = $shop;
    }
    /**
     * get Shop show list
     * @return view
     */
    public function getShopList()
    {
        return $this->shop->getList();
    }

    /**
     * get Shop form create data
     * @return view
     */
    public function getFormShopCreate()
    {
        return $this->shop->getCreateForm();
    }

    /**
     * get Shop form update data
     * @param  GetUpdateShopRequest $request
     * @return view
     */
    public function getFormShopUpdate(ShopGetUpdateRequest $request)
    {
        return $this->shop->getUpdateForm($request->id);
    }

    /**
     * get Shop form detail data
     * @return [type] [description]
     */
    public function getShopDetail(ShopGetDetailRequest $request)
    {
        return $this->members->getFormDetail($request->id);
    }

    /**
     * submit create Shop data to api
     * @param  CreateShopRequest $request
     * @return redirect back with flash success
     */
    public function submitFormShopCreate(ShopCreateRequest $request)
    {
        $this->shop->createDataApi($request->all());
        return redirect()->route('shop.view')
            ->withFlashSuccess('create shop data success');
    }

    /**
     * submit update Shop data to api
     * @param  UpdateShopRequest $request
     * @return redirect back with flash success
     */
    public function submitFormShopUpdate(ShopUpdateRequest $request)
    {
        $this->shop->updateDataApi($request->id, $request->all());
        return redirect()->route('shop.view')
            ->withFlashSuccess('update shop data success');
    }

    /**
     * submit delete Shop data to api
     * @param  DeleteShopRequest $request
     * @return redirect back with flash success
     */
    public function submitFormShopDelete(ShopDeleteRequest $request)
    {
        $this->shop->deleteDataApi($request->id);
        return redirect()->route('shop.view')
            ->withFlashSuccess('delete shop data success');
    }
}
