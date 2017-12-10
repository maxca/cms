<?php
namespace App\Repositories\Modify;

use App\Repositories\Interfaces\ServiceTemplateInterface;
use App\Repositories\Interfaces\ServiceTransactionInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ServiceTransactionRepository implements ServiceTransactionInterface
{
    protected $template;
    protected $response;
    private $limit;
    private $offset;
    private $model;
    public function __construct(ServiceTemplateInterface $template)
    {
        $this->template = $template;
        $this->limit = 30;
        $this->offset = 0;
        $this->model = $this->model();
    }
    public function model()
    {
        return app()->make('App\Models\Transaction');
    }
    public function getPaginate()
    {
        return $this->model->paginate($this->limit);
    }

    public function convertDate($date = '')
    {
        return date('Y-m-d H:i:s', strtotime(str_replace(['/'], "-", $date)));
    }
    public function setLimit($limit = 30)
    {
        $this->limit = $limit;
    }
    public function setOffset($offset = 0)
    {
        $this->offset = $offset;
    }
    public function generateInput()
    {
        $this->template->recapValue(\Request::all());
        return $this->template->generateInput();
    }
    public function setConfigFile($template = '')
    {
        $this->template->setConfigFile($template);
    }

    public function paginate($items, $total)
    {
        return new LengthAwarePaginator($items, $total,
            $this->limit, Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }
    public function call3rd($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        $response = curl_exec($ch);
        if (\Request::has('debug')) {
            dump($url);
            echo "<a href='{$url}' target='_blank' >click </a>";
            dump(curl_getinfo($ch, CURLINFO_HTTP_CODE));
            dump(curl_errno($ch));
            dump(curl_error($ch));
        }
        curl_close($ch);

        $this->response = json_decode($response, true);
        return $this->response;
    }
    public function call3rdPost($url, $data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $response = curl_exec($ch);

        if (isset($data['debug'])) {
            dump($data);
            dump($url);
            dump(curl_getinfo($ch, CURLINFO_HTTP_CODE));
            dump(curl_errno($ch));
            dump(curl_error($ch));
            curl_close($ch);
        }
        $this->response = json_decode($response, true);
        return $this->response;
    }
    public function getResposne()
    {
        return $this->response;
    }
    public function warpCallPage($url = '', $params = array())
    {
        $page = \Request::has('page') ? \Request::get('page') : 1;
        $this->offset = ($page == 1) ? $this->offset : ($this->limit * $page) - $this->limit;
        $url = $url . '?' . http_build_query(\Request::all()) . "&limit=" . $this->limit . "&offset=" . $this->offset . "&" . http_build_query($params);

        $call3rdApi = $this->call3rd($url);
        if ($call3rdApi['header']['code'] == 200) {
            return $this->paginate($call3rdApi['data'], $call3rdApi['total']);
        } else {
            return $this->paginate([], 0);
        }
        return false;
    }
    public function uploadFileRaw($url, $files, $data)
    {
        $uploadfile = $this->warpFileUpload($files);
        $data = array_merge($uploadfile, $data);
        $request = curl_init($url);
        $headers = array(
            "authorization: Basic Ym9vbTpib29teg==",
            "cache-control: no-cache",
        );
        curl_setopt($request, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_TIMEOUT, 30);
        curl_setopt($request, CURLOPT_HEADER, 'multipart/form-data');
        curl_setopt(
            $request, CURLOPT_POSTFIELDS, $data
        );
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($request);

        curl_close($request);
        return json_decode($result, true);

    }
    public function warpFileUpload($files)
    {
        $fileUpload = array();
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $realpath = realpath($file);
                $path = $file->move(public_path('upload'), $file->getClientOriginalName())->getpathName();
                $fileUpload[$key] = curl_file_create($path, $file->getClientMimeType());
            }

        }
        return $fileUpload;
    }

}
