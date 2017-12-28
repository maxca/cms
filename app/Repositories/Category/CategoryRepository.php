<?php
namespace App\Repositories\Category;

use App\Repositories\BaseRepositoryWrap;

class CategoryRepository extends BaseRepositoryWrap
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
        'create' => 'category.create',
        'update' => 'category.update',
        'delete' => 'category.delete',
    ];

    /**
     * set config header of table show in list view
     * @var array
     */
    protected $configFormColumn = [
        "cate_id",
        "slug",
        "commission",
        "parent_cate_id",
        "level",
        // "cate_img_en",
        "sort",
        "cate_name_th",
        "cate_name_en",
        "created_at",
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
        'route_list' => 'category.view',
        'route_view' => 'category.detail',
        'route_edit' => 'category.submit.update',
        'route_dele' => 'category.submit.delete',
    ];

    /**
     * set config form search attribute
     * @var string
     */
    protected $configListSearch = 'category.list';

    /**
     * set config create attribute
     * @var string
     */

    protected $configCreate = 'category.create';
    protected $configUpdate = 'category.update';
    /**
     * set route search action
     * @get form alias naming router.
     * @var string
     */
    protected $routeAction = 'category.view';

    /**
     * set title name of page
     * @var string
     */
    protected $title = 'Category';

    protected $lang = 'th';
    /**
     * set images list
     * @var array
     */
    protected $imageList = [
        'cate_img_th',
        'cate_img_en',
        'icon_img',
    ];

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
        $this->getParentCateid();
        return parent::getCreateForm();
    }

    public function getParentCateid()
    {
        $level = \Request::get('level', 1);
        $this->injectNode['level'] = $level;

        if ($level == 1) {
            $this->configCreate = 'category.createMainCate';

        } else {
            parent::setParam(['level' => $level - 1]);
            $data = parent::callGetListData();
            $data = !is_null($data['item']) ? $data['item'] : array();
            $nodeInject = array();

            foreach ($data as $key => $value) {
                $nodeInject['parent_cate_id'][$value['cate_id']] = $value['cate_name_' . $this->lang];
            }
            $this->injectNode = $nodeInject;
        }

    }

}
