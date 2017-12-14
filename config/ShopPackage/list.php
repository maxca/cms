<?php

return [
    [
        'name' => 'package_name_th',
        'label' => 'package name[th]',
        'id' => 'package_name_th',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert package_name_th',
    ], [
        'name' => 'package_name_en',
        'label' => 'package name[en]',
        'id' => 'package_name_en',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert package_name_en',
    ], [
        'name' => 'price',
        'label' => 'price',
        'id' => 'price',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert price',
    ], [
        'name' => 'item_product',
        'label' => 'item of product',
        'id' => 'item_product',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert item_product',
    ], [
        'name' => 'period',
        'label' => 'period (year)',
        'id' => 'period',
        'type' => 'select',
        'required' => 'required',
        'placeholder' => 'please select period',
        'select' => [
            'displayname' => 'select periad',
            'list' => [
                '1' => '1 year',
                '2' => '2 year',
                '3' => '3 year',
                '4' => '4 year',
            ],
        ],
    ], [
        'name' => 'created_at',
        'label' => 'created_at',
        'id' => 'created_at',
        'type' => 'daterange',
        'required' => 'required',
        'placeholder' => 'please insert created_at',
    ],
];
