<?php

return [
    [
        'name' => 'cate_id',
        'label' => 'cate_id',
        'id' => 'cate_id',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert cate_id',
    ], [
        'name' => 'parent_cate_id',
        'label' => 'parent_cate_id',
        'id' => 'parent_cate_id',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert parent_cate_id',
    ], [
        'name' => 'level',
        'label' => 'level',
        'id' => 'level',
        'type' => 'select',
        'required' => 'required',
        'placeholder' => 'please insert level',
        'select' => [
            'displayname' => 'select level',
            'list' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
            ],
        ],
    ], [
        'name' => 'icon_img',
        'label' => 'icon_img',
        'id' => 'icon_img',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert icon_img',
    ], [
        'name' => 'cate_img_th',
        'label' => 'cate_img_th',
        'id' => 'cate_img_th',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_img_th',
    ], [
        'name' => 'cate_img_en',
        'label' => 'cate_img_en',
        'id' => 'cate_img_en',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_img_en',
    ], [
        'name' => 'sort',
        'label' => 'sort',
        'id' => 'sort',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert sort limit',
    ], [
        'name' => 'cate_name_th',
        'label' => 'cate_name_th',
        'id' => 'cate_name_th',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_name_th',
    ], [
        'name' => 'cate_name_en',
        'label' => 'cate_name_en',
        'id' => 'cate_name_en',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_name_en',
    ],
];
