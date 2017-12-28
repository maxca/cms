<?php
namespace App\Repositories;

class UploadFileRepository
{
    protected $url;
    protected $response;
    protected $imageList;

    public function __construct()
    {
        $this->url = env('API_URL') . '/api/v1/upload/images';
    }
    /**
     * Specify Model class name
     *
     * @return string
     */

    public function uploadFile($images)
    {
        $this->response = self::uploadFileRaw($this->url, $images, []);
        return $this;
    }
    public function getUploadFileByID($id)
    {
        return $this->model->find($id);
    }
    public function getResponse()
    {
        if ($this->response['code'] == 200) {
            foreach ($this->response['data']['image_name'] as $key => $image) {
                $this->imageList[] = array_get($this->response, 'data.base_url') . '/' . $image;
            }
        }
        return $this->imageList;
    }
    public function uploadFileRaw($url, $files, $data)
    {
        $uploadfile = $this->warpFileUpload($files);
        $data = array_merge($uploadfile, $data);

        $request = curl_init($url);

        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_TIMEOUT, 30);
        curl_setopt($request, CURLOPT_HEADER, 'multipart/form-data');
        curl_setopt(
            $request, CURLOPT_POSTFIELDS, $data
        );
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($request);
        $k = curl_getinfo($request);
        $error = curl_error($request);

        curl_close($request);

        return json_decode($result, true);

    }
    public function newUpload($files)
    {
        $fileUpload = array();
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $fileUpload[$key]['name'] = $file->getClientOriginalName();
                $fileUpload[$key]['filename'] = $file->getClientOriginalName();
                $fileUpload[$key]['contents'] = fopen($file->getpathName(), 'r');
            }
        }
        return $fileUpload;
    }
    public function warpFileUpload($files)
    {
        // dd($files);
        $fileUpload = array();
        foreach ($files as $key => $file) {
            if (!empty($file)) {
                $realpath = realpath($file);
                // $path = $file->move(public_path('upload'), $file->getClientOriginalName())->getpathName();
                $fileUpload[$key] = curl_file_create($realpath, $file->getClientMimeType(), $file->getClientOriginalName());
            }
        }
        return $fileUpload;
    }

}
