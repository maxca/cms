<?php

namespace App\Http\Controllers\Backend;

use App\Benefit;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\CreateStepRequest;
use App\Http\Requests\DeleteCategoryRequest;
use App\Http\Requests\GetUpdateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateStepRequest;
use App\Repositories\Ebirthday\serviceEbirthdayRepository as ServiceEbirthday;
use App\Repositories\Interfaces\ServiceWarpTemplateInterface;
use App\Repositories\Member\MemberRepository;

class MainBackendController extends Controller
{
    protected $template;
    protected $benefit;
    protected $ebirthday;

    public function __construct(ServiceWarpTemplateInterface $template, ServiceEbirthday $ebirthday)
    {
        $this->template = $template;
        $this->ebirthday = $ebirthday;
    }
    public function index()
    {
        $view['data'] = $this->ebirthday->page(30);
        $view['view'] = genformSearch('ebirthday');
        return view('backend.ebrithday-list', $view);
    }
    public function store(CreateStepRequest $request)
    {
        $this->benefit->create($request->all());
        $redirect = $this->template->warpupRequestPerson($request->get('person'));
        return redirect()->route($redirect)
            ->withFlashSuccess(trans('lang.alert.create-step-success'));
    }
    public function edit($id)
    {
        $nodeData = $this->benefit->findID($id);
        $this->template->setConfigFile('ir-create-step');
        $this->template->setFormType('template.input-form-one');
        $this->template->recapValue($nodeData);
        $view['view'] = $this->template->generateFrom();
        return view('backend.create-step', $view);
    }
    public function getVIP()
    {
        $view['data'] = $this->benefit->getBenefit(['person' => 'VIP']);
        $view['view'] = $this->template->generateFrom('ir-step-search', \Config::get('ir-inject-node.vip'));
        return view('backend.step-list', $view);
    }
    public function getNormal()
    {
        $view['data'] = $this->benefit->getBenefit(['person' => 'Normal']);
        $view['view'] = $this->template->generateFrom('ir-step-search', \Config::get('ir-inject-node.normal'));
        return view('backend.step-list', $view);
    }
    public function update(UpdateStepRequest $request, $id)
    {
        $this->benefit->update($id);
        return redirect("admin/step/benefit/{$id}/edit")
            ->withFlashSuccess(trans('lang.alert.update-step-success'));
    }
    public function destroy($id)
    {
        $this->benefit->delete($id);
        return back()
            ->withFlashSuccess(trans('lang.alert.delete-step-success'));
    }
    public function getMemberList()
    {
        return app(MemberRepository::class)->getList();
        dd($k);
    }
    public function getFormCreate()
    {
        return app(MemberRepository::class)->getCreateForm();
    }
    public function submitFormCreate(CreateCategory $request)
    {
        app(MemberRepository::class)->createDataApi($request->all());
        return redirect()->route('transaction.lisst')->withFlashSuccess('create data success');
    }
    public function getFormUpdate(GetUpdateCategoryRequest $request)
    {
        return app(MemberRepository::class)->getUpdateForm($request->id);
    }
    public function submitFormUpdate(UpdateCategoryRequest $request)
    {
        app(MemberRepository::class)->updateDataApi($request->id, $request->all());
        return redirect()->route('transaction.lisst')->withFlashSuccess('update data success');
    }
    public function submitFormDelete(DeleteCategoryRequest $request)
    {
        app(MemberRepository::class)->deleteDataApi($request->id);
        return redirect()->route('transaction.lisst')->withFlashSuccess('delete data success');
    }
}
