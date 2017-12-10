<?php

namespace App\Http\Controllers\Backend\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\CreateCategoryRequest;
use App\Http\Requests\Member\DeleteCategoryRequest;
use App\Http\Requests\Member\GetUpdateCategoryRequest;
use App\Http\Requests\Member\UpdateCategoryRequest;
use App\Repositories\Member\MemberRepository;

class MockUpBackendController extends Controller
{
    /**
     * member repository
     * @var object
     */
    protected $member;

    public function __construct(MemberRepository $member)
    {
        $this->member = $member;
    }
    /**
     * get member show list
     * @return view
     */
    public function getMemberList()
    {
        return $this->member->getList();
    }

    /**
     * get member form create data
     * @return view
     */
    public function getFormCreate()
    {
        return $this->member->getCreateForm();
    }

    /**
     * get member form update data
     * @param  GetUpdateCategoryRequest $request
     * @return view
     */
    public function getFormUpdate(GetUpdateCategoryRequest $request)
    {
        return $this->member->getUpdateForm($request->id);
    }

    /**
     * submit create member data to api
     * @param  CreateCategoryRequest $request
     * @return redirect back with flash success
     */
    public function submitFormCreate(CreateCategoryRequest $request)
    {
        $this->member->createDataApi($request->all());
        return redirect()->route('transaction.lisst')
            ->withFlashSuccess('create data success');
    }

    /**
     * submit update member data to api
     * @param  UpdateCategoryRequest $request
     * @return redirect back with flash success
     */
    public function submitFormUpdate(UpdateCategoryRequest $request)
    {
        $this->member->updateDataApi($request->id, $request->all());
        return redirect()->route('transaction.lisst')
            ->withFlashSuccess('update data success');
    }

    /**
     * submit delete member data to api
     * @param  DeleteCategoryRequest $request
     * @return redirect back with flash success
     */
    public function submitFormDelete(DeleteCategoryRequest $request)
    {
        $this->member->deleteDataApi($request->id);
        return redirect()->route('transaction.lisst')
            ->withFlashSuccess('delete data success');
    }
}
