<?php

namespace App\Repositories;

class ListFormRepository
{
    /**
     * set form list
     * @var array
     */
    protected $formList = [];

    /**
     * set integraion data
     * @var array
     */
    protected $data = [];

    /**
     * set route list
     * @var array
     */
    protected $route;

    /**
     * set action route
     * @var array
     */
    protected $action = [];

    /**
     * set view variable
     * @var array
     */
    protected $view;

    /**
     * set image variable
     * @var array
     */
    protected $images;

    /**
     * set custom link
     * @var array
     */
    protected $customLink;

    /**
     * set shared view
     * @var array
     */
    protected $sharedView;

    public function __construct($formList)
    {
        $this->formList = $formList;
    }
    public function initial()
    {
        $this->view['formList'] = $this->formList;
        $this->view['route'] = $this->route;
        $this->view['action'] = $this->action;
        $this->view['title'] = $this->title;
        $this->view['images'] = $this->images;
        $this->view['customLink'] = $this->customLink;
        $this->view['sharedView'] = $this->sharedView;
    }
    public function setShareView($data)
    {
        $this->sharedView = $data;
        return $this;
    }
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }
    public function setAction($action = array())
    {
        $this->action = $action;
        return $this;
    }
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
    public function setImageList($images)
    {
        $this->images = $images;
        return $this;
    }
    public function setCustomlink($customLink)
    {
        $this->customLink = $customLink;
        return $this;
    }
    public function genFormList($formListSearch, $listData)
    {
        $this->initial();
        $this->view['data'] = $listData;
        $this->view['view'] = $formListSearch;
        return view('template.master-list', $this->view)->render();
    }
    public function genformCreate($formCreate)
    {
        $this->initial();
        $this->view['view'] = $formCreate;
        return view('template.master-create', $this->view)->render();
    }
    public function getFormUpdate($formUpdate)
    {
        $this->initial();
        $this->view['view'] = $formUpdate;
        return view('template.master-update', $this->view)->render();
    }
    public function getFormDetail($formDetail, $data)
    {
        $this->initial();
        $this->view['view'] = $formDetail;
        $this->view['data'] = $data;
        return view('template.master-detail', $this->view)->render();
    }
}
