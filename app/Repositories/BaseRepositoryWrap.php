<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\ListFormRepository;
use App\Repositories\Modify\ServiceTransactionRepository as Call3rd;

abstract class BaseRepositoryWrap extends BaseRepository
{
    /**
     * setconfig form create
     * @var array
     */
    protected $configFormCreate;

    /**
     * setconfig route alias name form local router.
     * @var array
     */

    protected $routeAliasName;
    /**
     * setconfig form serach
     * @var arary
     */

    protected $configFormColumn;

    /**
     * set config endpoint CRUD
     * @var array
     */
    protected $configEndpoint;

    /**
     * setconfig list serach attribute
     * get config local config file
     * @var array
     */
    protected $configListSearch;

    /**
     * setconfig form create attribute
     * get config local config file
     * @var array
     */
    protected $configCreate;

    /**
     * set config update from
     * @var string
     */
    protected $configUpdate;
    /**
     * set config route
     * get form aliasname route
     * @var string
     */
    protected $routeAction;

    /**
     * @App\Repositories\Modify\ServiceTransactionRepository
     * @var object
     */
    protected $call3rd;

    /**
     * set title of page.
     * @var string
     */
    protected $title;

    /**
     * set action of list page.
     * @var array
     */
    protected $action = [];

    /**
     * set reqeust params
     * @var array
     */
    protected $params = [];

    /**
     * set view
     * @var object
     */
    protected $view;

    /**
     * set inject node data
     * @var array
     */
    protected $injectNode;

    /**
     * set hidden column
     * @var array
     */
    protected $hiddenColumn;

    /**
     * set image column list
     * @var array
     */
    protected $imageList;

    public function __construct()
    {
        parent::__construct();
        $this->call3rd = app(Call3rd::class);
        $this->setEndpoint();
        $this->setView();
    }
    protected function getEndpoint()
    {
        return $this->configEndpoint;
    }
    protected function setParam($params = array())
    {
        $this->params = array_filter($params);
    }
    protected function setTitle($title)
    {
        $this->title = $title;
    }
    private function setEndpoint()
    {
        foreach ($this->configEndpoint as $key => $value) {
            $this->configEndpoint[$key] = env('API_URL') . $value;
        }
    }
    private function setView()
    {
        $this->view = app(ListFormRepository::class, [$this->configFormColumn])
            ->setRoute($this->routeAction)
            ->setAction($this->action)
            ->setTitle($this->title);
    }
    public function getListData()
    {
        $listData = $this->callGetListData();
        $responseData = $this->call3rd->getResposne();
        $keys = collect(array_get($responseData, 'data.item.0'))->keys();
        return $this->view->genFormList(genformSearch($this->configListSearch), $listData);
    }
    public function callGetListData()
    {
        return $this->call3rd->warpCallPage($this->configEndpoint['list'], $this->params);
    }
    public function getDataByid($id = 0)
    {
        $data = $this->call3rd->warpCallPage($this->configEndpoint['list'] . '?id=' . $id);
        return $data['item'][0];
    }
    public function getFormDetail($id = 0)
    {
        $data = $this->getDataByid($id);
        $listData = $this->getDataByid($id);
        return $this->view->getFormDetail(genformCreate($this->configUpdate, $listData));
    }
    public function getCreateForm()
    {
        $this->routeAction = $this->routeAliasName['create'];
        $this->setView();

        return $this->view->genformCreate(genformCreate($this->configCreate, $this->injectNode));
    }
    public function checkHiddenColumnCreate()
    {
        foreach ($this->configCreate as $key => $value) {
            if (array_key_exists($value['name'], $this->hiddenColumn)) {
                unset($this->configCreate[$key]);
            }
        }
    }
    public function getUpdateForm($id = '')
    {
        $this->routeAction = $this->routeAliasName['update'];
        $this->setView();
        $listData = $this->getDataByid($id);
        return $this->view->getFormUpdate(genformCreate($this->configUpdate, $listData));
    }
    public function modifyData($type = 'create')
    {
        $this->checkImageNodes($this->params);
        return parent::postCallApiJson($this->configEndpoint[$type], $this->params);
    }
    public function checkImageNodes(&$params)
    {
        $images = array();
        $params = array_filter($params);

        foreach ($params as $key => $image) {
            if (in_array($key, $this->imageList)) {
                $array = parent::uploadImage($params[$key]);
                $params[$key] = !empty($array) ? $array : false;
                $images[$key] = $params[$key];
                if (is_null($image[0])) {
                    unset($params[$key]);
                }
            }
        }
        return $images;
    }
    public function createDataApi($params)
    {
        $this->setParam($params);
        return $this->modifyData('create');
    }
    public function updateDataApi($id, $params)
    {
        $this->setParam($params);
        return $this->modifyData('update', $id);
    }
    public function deleteDataApi($id)
    {
        $this->setParam(['id' => $id]);
        return $this->modifyData('delete');
    }

}
