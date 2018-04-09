<?php

namespace App\Repositories;

use App\Libraries\Benchmark;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\UploadFileRepository as UploadImage;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * set total
     * @var int
     */
    protected $total;

    /**
     * [$limit description]
     * @var [type]
     */
    protected $limit;

    /**
     * [$offset description]
     * @var [type]
     */
    protected $offset;

    /**
     * [$orderBy description]
     * @var [type]
     */
    protected $orderBy;

    /**
     * [$sortTyp description]
     * @var [type]
     */
    protected $sortTyp;

    /**
     * [$model description]
     * @var [type]
     */
    protected $model;

    /**
     * [$lang description]
     * @var [type]
     */
    protected $lang;

    /**
     * [$mergeCheck description]
     * @var [type]
     */
    protected $mergeCheck;

    /**
     * [$dataMerge description]
     * @var [type]
     */
    protected $dataMerge;

    /**
     * [$langList description]
     * @var [type]
     */
    protected $langList = ['en', 'th'];

    /**
     * set token
     * @var string
     */
    protected $token = "";

    public function __construct()
    {
        $transaction_id = \Request::get('transaction_id', generateTransection());
        $this->benchmark = new Benchmark();
        $this->benchmark->mark('start');
    }
    public function getData()
    {
        return $this->response($this->model->get());
    }
    public function response($data)
    {
        if (count($data) > 0) {
            $response = $this->renderJson(200, $data);
        } else {
            $response = $this->renderJson(404);
        }
        return $response;
    }
    public function reponseModel()
    {
        return $this->renderJson(200, $this->model);
    }
    public function renderJson($code = 200, $data = '')
    {
        $data = !empty($data) && !is_array($data) ? $data->toArray() : $data;
        $response = [
            'header' => [
                'code' => $code,
                'message' => $code == 200 ? 'OK' : 'Not found',
            ],
            'transaction_id' => \Request::get('transaction_id', generateTransection()),
            // 'total' => $this->total,
            // 'count_result' => count($data),
            'date_current' => date('Y-m-d H:i:s'),

            'data' => [
                'item' => $data,
            ],

        ];
        if ($this->mergeCheck === true) {
            $response['data']['merges'] = $this->dataMerge;
        }
        $this->benchmark->mark('end');
        $responseTime = $this->benchmark->elapsed_time('start', 'end');
        $responseReturn['process_time'] = $responseTime;
        $response['process_time'] = $responseTime;
        // $requestAll = \Request::all();
        $requestAll = [];
        if (isset($requestAll['password'])) {
            unset($requestAll['password']);
        }
        return array_merge($response, $requestAll);
    }

    public function getTotals()
    {
        $this->total = $this->model->count();
        return $this;
    }
    public function setLimitOffset($limit = 30, $offset = 0)
    {
        $this->model = $this->model->take($limit)->skip($offset);
        return $this;
    }
    public function orderBy($column = 'id', $sort = 'desc')
    {
        $this->model = $this->model->orderBy($column, $sort);
        return $this;
    }
    public function withLang($lang = 'all')
    {
        switch ($lang) {
            case 'all':
                $this->model = $this->model->with('langs');
                break;
            default:
                $this->model = $this->model->with(['langs' => function ($query) use ($lang) {
                    $query->where('lang', $lang);
                }]);
                break;
        }
        $this->model = $this->model->wherehas('langs', function ($query) {});
        return $this;
    }
    public function createData($params = array())
    {
        $this->total = 1;
        return $this->response($this->model->create($params));
    }
    public function updateData($params = array())
    {
        $this->total = 1;
        $this->model->find($params['id'])->update($params);
        return $this->response($this->model->find($params['id']));
    }
    public function delete($params = array())
    {
        $this->total = 1;
        $data = $this->model->find($params['id']);
        $data->delete();
        return $this->response($data);
    }
    public function setLang($lang = 'en')
    {
        \App::setLocale($lang);
        return $this;
    }
    public function setDataMerge($data)
    {
        $this->dataMerge[$data['key']] = $data['data'];
    }
    public function setDataMergestatus($status)
    {
        $this->mergeCheck = $status;
    }
    public function postCallApi($url, $data)
    {
        $this->response = curlPost($url, $this->token, $data);
        return $this->response;
    }
    public function postCallApiJson($url, $data)
    {
        $this->response = curlPostRAW($url, $this->token, $data);
        return $this->response;
    }
    protected function setParams(&$params)
    {
        $params['limit'] = isset($params['limit']) ? $params['limit'] : $this->limit;
        $params['offset'] = isset($params['offset']) ? $params['offset'] : $this->offset;
        $params['order_by'] = isset($params['order_by']) ? $params['order_by'] : $this->orderBy;
        $params['sort_type'] = isset($params['sort_type']) ? $params['sort_type'] : $this->sortType;
    }
    public function callGet($url, $params = array())
    {
        $this->setParams($params);
        return curlGet($url, $this->token, $params);
    }
    public function uploadImage($images)
    {
        $this->response = app(UploadImage::class)->uploadFile($images)
            ->getResponse();
        return $this->response;
    }

}
