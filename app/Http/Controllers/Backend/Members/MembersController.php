<?php

namespace App\Http\Controllers\Backend\Members;

use App\Http\Controllers\Controller;
use App\Http\Requests\Members\MembersCreateRequest;
use App\Http\Requests\Members\MembersDeleteRequest;
use App\Http\Requests\Members\MembersGetDetailRequest;
use App\Http\Requests\Members\MembersGetUpdateRequest;
use App\Http\Requests\Members\MembersUpdateRequest;
use App\Repositories\Members\MembersRepository;

class MembersController extends Controller
{
    /**
     * Members repository
     * @var object
     */
    protected $members;

    public function __construct(MembersRepository $members)
    {
        $this->members = $members;
    }
    /**
     * get Members show list
     * @return view
     */
    public function getMembersList()
    {
        return $this->members->getList();
    }

    /**
     * get Members form create data
     * @return view
     */
    public function getFormMembersCreate()
    {
        return $this->members->getCreateForm();
    }

    /**
     * get Members form update data
     * @param  GetUpdateMembersRequest $request
     * @return view
     */
    public function getFormMembersUpdate(MembersGetUpdateRequest $request)
    {
        return $this->members->getUpdateForm($request->id);
    }

    /**
     * get Members form detail data
     * @return [type] [description]
     */
    public function getMembersDetail(MembersGetDetailRequest $request)
    {
        return $this->members->getFormDetail($request->id);
    }

    /**
     * submit create Members data to api
     * @param  CreateMembersRequest $request
     * @return redirect back with flash success
     */
    public function submitFormMembersCreate(MembersCreateRequest $request)
    {
        $this->members->createDataApi($request->all());
        return redirect()->route('members.view')
            ->withFlashSuccess('create members data success');
    }

    /**
     * submit update Members data to api
     * @param  UpdateMembersRequest $request
     * @return redirect back with flash success
     */
    public function submitFormMembersUpdate(MembersUpdateRequest $request)
    {
        $this->members->updateDataApi($request->id, $request->all());
        return redirect()->route('members.view')
            ->withFlashSuccess('update members data success');
    }

    /**
     * submit delete Members data to api
     * @param  DeleteMembersRequest $request
     * @return redirect back with flash success
     */
    public function submitFormMembersDelete(MembersDeleteRequest $request)
    {
        $this->members->deleteDataApi($request->id);
        return redirect()->route('members.view')
            ->withFlashSuccess('delete members data success');
    }
}
