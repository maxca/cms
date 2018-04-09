<?php
namespace App\Repositories\Member;

use App\Repositories\BaseRepositoryWrap;

class MemberRepository extends BaseRepositoryWrap
{
    /**
     * set all of endpoint api
     * @var array
     */
    protected $configEndpoint = [
        'list' => '/cms/category/list',
        'create' => '/cms/category/create',
        'update' => '/cms/category/update',
        'delete' => '/cms/category/delete',
    ];

    /**
     * set route alias name
     * @var array
     */
    protected $routeAliasName = [
        'create' => 'transaction.create',
        'update' => 'transaction.update',
        'delete' => 'transaction.delete',
    ];

    /**
     * set config header of table show in list view
     * @var array
     */
    protected $configFormColumn = [
        "customer_code",
        "name",
        "eamil",
        "mobile_phone",
        "identification",
        "level",
        "status",
        "brand",
        "created_at",
        "updated_at",
    ];

    /**
     * set showing action menu and route
     * setting true open false close menu
     * @var array
     */
    protected $action = [
        'view' => false,
        'edit' => true,
        'dele' => true,
        'route_view' => 'transaction.lisst',
        'route_edit' => 'transaction.update',
        'route_dele' => 'transaction.delete',
    ];

    /**
     * set config form search attribute
     * @var string
     */
    protected $configListSearch = 'ir-step-search';

    /**
     * set config create attribute
     * @var string
     */

    protected $configCreate = 'category.create';
    /**
     * set route search action
     * @get form alias naming router.
     * @var string
     */
    protected $routeAction = 'transaction.lisst';

    /**
     * set title name of page
     * @var string
     */
    protected $title = 'Category';

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
