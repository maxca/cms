<?php
namespace App\Repositories\ShopPackage;

use App\Repositories\BaseRepositoryWrap;

class ShopPackageRepository extends BaseRepositoryWrap
{
    /**
     * set all of endpoint api
     * @var array
     */
    protected $configEndpoint = [
        'list' => '/api/v1/shoppackage/list',
        'create' => '/api/v1/shoppackage/create',
        'update' => '/api/v1/shoppackage/update',
        'delete' => '/api/v1/shoppackage/delete',
    ];

    /**
     * set route alias name
     * @var array
     */
    protected $routeAliasName = [
        'create' => 'shoppackage.create',
        'update' => 'shoppackage.update',
        'delete' => 'shoppackage.delete',
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
        'route_view' => 'shoppackage.view',
        'route_edit' => 'shoppackage.submit.update',
        'route_dele' => 'shoppackage.submit.delete',
    ];

    /**
     * set config form search attribute
     * @var string
     */
    protected $configListSearch = 'ShopPackage.list';

    /**
     * set config create attribute
     * @var string
     */

    protected $configCreate = 'ShopPackage.create';
    /**
     * set route search action
     * @get form alias naming router.
     * @var string
     */
    protected $routeAction = 'shoppackage.view';

    /**
     * set title name of page
     * @var string
     */
    protected $title = 'ShopPackage';

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

