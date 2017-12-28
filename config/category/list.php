<?php
return [
    [
        'name' => 'cate_id',
        'label' => 'category id',
        'id' => 'cate_id',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_id',
    ], [
        'name' => 'parent_cate_id',
        'label' => 'parent category id',
        'id' => 'parent_cate_id',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert parent_cate_id',
    ], [
        'name' => 'commission',
        'label' => 'commission',
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
        'name' => 'cate_name_th',
        'label' => 'category name th',
        'id' => 'cate_name_th',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert cate_name_th',
    ],
    [
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
        'type' => 'select',
        'required' => 'required',
        'placeholder' => 'please select level',
        'select' => [
            'displayname' => 'select level',
            'list' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
            ],
        ],
    ],
    [
        'name' => 'created_at',
        'label' => 'created_at',
        'id' => 'created_at',
        'type' => 'daterange',
        'required' => 'required',
        'placeholder' => 'please insert created_at',
    ],
];
