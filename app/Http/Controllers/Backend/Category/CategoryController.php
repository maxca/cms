<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryDeleteRequest;
use App\Http\Requests\Category\CategoryGetDetailRequest;
use App\Http\Requests\Category\CategoryGetUpdateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
use App\Repositories\Category\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Category repository
     * @var object
     */
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    /**
     * get Category show list
     * @return view
     */
    public function getCategoryList()
    {
        return $this->category->getList();
    }

    /**
     * get Category form create data
     * @return view
     */
    public function getFormCategoryCreate()
    {
        return $this->category->getCreateForm();
    }

    /**
     * get Category form update data
     * @param  GetUpdateCategoryRequest $request
     * @return view
     */
    public function getFormCategoryUpdate(CategoryGetUpdateRequest $request)
    {
        return $this->category->getUpdateForm($request->id);
    }

    /**
     * get Category form detail data
     * @return [type] [description]
     */
    public function getCategoryDetail(CategoryGetDetailRequest $request)
    {
        return $this->category->getFormDetail($request->id);
    }

    /**
     * submit create Category data to api
     * @param  CreateCategoryRequest $request
     * @return redirect back with flash success
     */
    public function submitFormCategoryCreate(CategoryCreateRequest $request)
    {
        $this->category->createDataApi($request->all());
        return redirect()->route('category.view')
            ->withFlashSuccess('create category data success');
    }

    /**
     * submit update Category data to api
     * @param  UpdateCategoryRequest $request
     * @return redirect back with flash success
     */
    public function submitFormCategoryUpdate(CategoryUpdateRequest $request)
    {
        $this->category->updateDataApi($request->id, $request->all());
        return redirect()->route('category.view')
            ->withFlashSuccess('update category data success');
    }

    /**
     * submit delete Category data to api
     * @param  DeleteCategoryRequest $request
     * @return redirect back with flash success
     */
    public function submitFormCategoryDelete(CategoryDeleteRequest $request)
    {
        $this->category->deleteDataApi($request->id);
        return redirect()->route('category.view')
            ->withFlashSuccess('delete category data success');
    }
}
