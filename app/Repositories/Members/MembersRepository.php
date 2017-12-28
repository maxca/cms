<?php
namespace App\Repositories\Members;

use App\Repositories\BaseRepositoryWrap;

class MembersRepository extends BaseRepositoryWrap
{
    /**
     * set all of endpoint api
     * @var array
     */
    protected $configEndpoint = [
        'list' => '/cms/members/list',
        'create' => '/cms/members/create',
        'update' => '/cms/members/update',
        'delete' => '/cms/members/delete',
    ];

    /**
     * set route alias name
     * @var array
     */
    protected $routeAliasName = [
        'create' => 'members.create',
        'update' => 'members.update',
        'delete' => 'members.delete',
    ];

    /**
     * set config header of table show in list view
     * @var array
     */
    protected $configFormColumn = [
        'member_type',
        // 'role_id',
        // 'sdfsdf',
        // 'facebook_id',
        // 'google_id',
        'email',
        'first_name',
        'last_name',
        // 'telephone',
        'mobile',
        'birthday',
        'gender',
        // 'country',
        // 'address',
        'province',
        // 'district',
        // 'subdistrict',
        // 'postal_code',
        // 'soi',
        // 'road',
        // 'building_type',
        // 'id_card_no',
        // 'img_profile',
        // 'path',
        // 'lastlogin_ip',
        'confirm_email',
        'status',
        'created_at',
    ];

    /**
     * set showing action menu and route
     * setting true open false close menu
     * @var array
     */
    protected $action = [
        'view' => true,
        'edit' => false,
        'dele' => true,
        'route_view' => 'members.detail',
        'route_edit' => 'members.submit.update',
        'route_dele' => 'members.submit.delete',
    ];

    /**
     * set config form search attribute
     * @var string
     */
    protected $configListSearch = 'Members.list';

    /**
     * set config create attribute
     * @var string
     */

    protected $configCreate = 'Members.create';
    /**
     * set route search action
     * @get form alias naming router.
     * @var string
     */
    protected $routeAction = 'members.view';

    /**
     * set title name of page
     * @var string
     */
    protected $title = 'Members';

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
