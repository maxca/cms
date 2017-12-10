<?php
namespace App\Repositories\Tests;

use App\Repositories\BaseRepositoryWrap;

class TestsRepository extends BaseRepositoryWrap
{
    /**
     * set all of endpoint api
     * @var array
     */
    protected $configEndpoint = [
        'list' => '/api/v1/tests/list',
        'create' => '/api/v1/tests/create',
        'update' => '/api/v1/tests/update',
        'delete' => '/api/v1/tests/delete',
    ];

    /**
     * set route alias name
     * @var array
     */
    protected $routeAliasName = [
        'create' => 'tests.create',
        'update' => 'tests.update',
        'delete' => 'tests.delete',
    ];

    /**
     * set config header of table show in list view
     * @var array
     */
    protected $configFormColumn = [
        "cate_id",
        "parent_cate_id",
        "level",
        "icon_img",
        "cate_img_th",
        "cate_img_en",
        "sort",
        "cate_name_th",
        "cate_name_en",
    ];

    /**
     * set showing action menu and route
     * setting true open false close menu
     * @var array
     */
    protected $action = [
        'view' => true,
        'edit' => true,
        'dele' => true,
        'route_view' => 'tests.view',
        'route_edit' => 'tests.submit.update',
        'route_dele' => 'tests.submit.delete',
    ];

    /**
     * set config form search attribute
     * @var string
     */
    protected $configListSearch = 'Tests.list';

    /**
     * set config create attribute
     * @var string
     */

    protected $configCreate = 'Tests.create';
    /**
     * set route search action
     * @get form alias naming router.
     * @var string
     */
    protected $routeAction = 'tests.view';

    /**
     * set title name of page
     * @var string
     */
    protected $title = 'Tests';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * get show list view wrap with data.
     * @return view object
     */
    public function getList()
    {
        return parent::getListData();
    }
    public function getCreateForm()
    {
        return parent::getCreateForm();
    }

}

