<?php

namespace App\Repositories;

class ListFormRepository
{
    protected $formList = [];
    protected $data = [];
    protected $route;
    protected $action = [];

    public function __construct($formList)
    {
        $this->formList = $formList;
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
    public function genFormList($formListSearch, $listData)
    {
        $view['data'] = $listData;
        $view['formList'] = $this->formList;
        $view['view'] = $formListSearch;
        $view['route'] = $this->route;
        $view['action'] = $this->action;
        $view['title'] = $this->title;
        return view('template.master-list', $view)->render();
    }
    public function genformCreate($formCreate)
    {
        $view['view'] = $formCreate;
        $view['route'] = $this->route;
        $view['title'] = $this->title;
        return view('template.master-create', $view)->render();
    }
    public function getFormUpdate($formUpdate)
    {
        $view['view'] = $formUpdate;
        $view['route'] = $this->route;
        $view['title'] = $this->title;
        return view('template.master-update', $view)->render();
    }
}
