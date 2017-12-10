<?php

namespace App\Http\Controllers\Backend\Tests;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tests\CreateTestsRequest;
use App\Http\Requests\Tests\DeleteTestsRequest;
use App\Http\Requests\Tests\GetUpdateTestsRequest;
use App\Http\Requests\Tests\UpdateTestsRequest;
use App\Repositories\Tests\TestsRepository;

class TestsController extends Controller
{
    /**
     * Tests repository
     * @var object
     */
    protected $tests;

    public function __construct(TestsRepository $tests)
    {
        $this->tests = $tests;
    }
    /**
     * get Tests show list
     * @return view
     */
    public function getTestsList()
    {
        return $this->tests->getList();
    }

    /**
     * get Tests form create data
     * @return view
     */
    public function getFormTestsCreate()
    {
        return $this->tests->getCreateForm();
    }

    /**
     * get Tests form update data
     * @param  GetUpdateTestsRequest $request
     * @return view
     */
    public function getFormTestsUpdate(GetUpdateTestsRequest $request)
    {
        return $this->tests->getUpdateForm($request->id);
    }

    /**
     * submit create Tests data to api
     * @param  CreateTestsRequest $request
     * @return redirect back with flash success
     */
    public function submitFormTestsCreate(CreateTestsRequest $request)
    {
        $this->tests->createDataApi($request->all());
        return redirect()->route('transaction.lisst')
            ->withFlashSuccess('create tests data success');
    }

    /**
     * submit update Tests data to api
     * @param  UpdateTestsRequest $request
     * @return redirect back with flash success
     */
    public function submitFormTestsUpdate(UpdateTestsRequest $request)
    {
        $this->tests->updateDataApi($request->id, $request->all());
        return redirect()->route('transaction.lisst')
            ->withFlashSuccess('update tests data success');
    }

    /**
     * submit delete Tests data to api
     * @param  DeleteTestsRequest $request
     * @return redirect back with flash success
     */
    public function submitFormTestsDelete(DeleteTestsRequest $request)
    {
        $this->tests->deleteDataApi($request->id);
        return redirect()->route('transaction.lisst')
            ->withFlashSuccess('delete tests data success');
    }
}
