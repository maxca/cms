<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function boot()
    {
        # code...
    }
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "id" => "required",
            "cate_id" => "required",
            "parent_cate_id" => "numeric",
            "level" => "required",
            "icon_img" => "required",
            "cate_img_th" => "required",
            "cate_img_en" => "required",
            "sort" => "required",
            "cate_name_th" => "required",
            "cate_name_en" => "required",
        ];
    }
}
