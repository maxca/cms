<?php
namespace App\Repositories\Shop;

use App\Repositories\BaseRepositoryWrap;

class ShopRepository extends BaseRepositoryWrap
{
    /**
     * set all of endpoint api
     * @var array
     */
    protected $configEndpoint = [
        'list' => '/api/v1/shop/list',
        'create' => '/api/v1/shop/create',
        'update' => '/api/v1/shop/update',
        'delete' => '/api/v1/shop/delete',
    ];

    /**
     * set route alias name
     * @var array
     */
    protected $routeAliasName = [
        'create' => 'shop.create',
        'update' => 'shop.update',
        'delete' => 'shop.delete',
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
        'route_view' => 'shop.view',
        'route_edit' => 'shop.submit.update',
        'route_dele' => 'shop.submit.delete',
    ];

    /**
     * set config form search attribute
     * @var string
     */
    protected $configListSearch = 'Shop.list';

    /**
     * set config create attribute
     * @var string
     */

    protected $configCreate = 'Shop.create';
    /**
     * set route search action
     * @get form alias naming router.
     * @var string
     */
    protected $routeAction = 'shop.view';

    /**
     * set title name of page
     * @var string
     */
    protected $title = 'Shop';

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

