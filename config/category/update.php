<?php

return [
    [
        'name' => 'cate_id',
        'label' => 'category id',
        'id' => 'cate_id',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert category id',
    ], [
        'name' => 'parent_cate_id',
        'label' => 'parent category id',
        'id' => 'parent_cate_id',
        'type' => 'disable',
        'required' => 'required',
        'placeholder' => 'please insert parent_cate_id',

    ],
    [
        'name' => 'cate_name_th',
        'label' => 'category name th',
        'id' => 'cate_name_th',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_name_th',
    ], [
        'name' => 'cate_name_en',
        'label' => 'category name en',
        'id' => 'cate_name_en',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_name_en',
    ],
    [
        'name' => 'level',
        'label' => 'level',
        'id' => 'level',
        'type' => 'disable',
        'required' => 'required',
        'placeholder' => 'please insert level',

    ], [
        'name' => 'icon_img[]',
        'label' => 'icon image',
        'id' => 'icon_img',
        'type' => 'file',
        'required' => 'required',
        'placeholder' => 'please insert icon_img',
    ], [
        'name' => 'commission',
        'label' => 'commission %',
        'id' => 'commission',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert commission',
    ], [
        'name' => 'slug',
        'label' => 'slug',
        'id' => 'slug',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert slug',
    ], [
        'name' => 'cate_img_th[]',
        'label' => 'category image th',
        'id' => 'cate_img_th',
        'type' => 'file',
        'required' => 'required',
        'placeholder' => 'please insert cate_img_th',
    ], [
        'name' => 'cate_img_en[]',
        'label' => 'category image en',
        'id' => 'cate_img_en',
        'type' => 'file',
        'required' => 'required',
        'placeholder' => 'please insert cate_img_en',
    ], [
        'name' => 'sort',
        'label' => 'sort',
        'id' => 'sort',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert sort limit',
        'value' => '99999',
    ],
    [
        'name' => 'level',
        'label' => '',
        'id' => 'level',
        'type' => 'hidden',
        'required' => 'required',
        'placeholder' => 'please insert level',

    ],
    [
        'name' => 'parent_cate_id',
        'label' => '',
        'id' => 'parent_cate_id',
        'type' => 'hidden',
        'required' => 'required',
        'placeholder' => 'please insert parent_cate_id',

    ],
];
