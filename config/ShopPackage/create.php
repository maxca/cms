<?php

return [
    [
        'name' => 'package_name_th',
        'label' => 'package name[th]',
        'id' => 'package_name_th',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert package_name_th',
    ], [
        'name' => 'package_name_en',
        'label' => 'package name[en]',
        'id' => 'package_name_en',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert package_name_en',
    ], [
        'name' => 'price',
        'label' => 'price',
        'id' => 'price',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert price',
    ], [
        'name' => 'item_product',
        'label' => 'item of product',
        'id' => 'item_product',
        'type' => 'number',
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
        'name' => 'image',
        'label' => 'package image',
        'id' => 'image',
        'type' => 'file',
        'required' => 'required',
        'placeholder' => 'please insert image',
    ], [
        'name' => 'sort',
        'label' => 'sort',
        'value' => '9999',
        'id' => 'sort',
        'type' => 'number',
        'required' => 'required',
        'placeholder' => 'please insert sort limit',
    ], [
        'name' => 'term_and_condition',
        'label' => 'term &condition',
        'id' => 'term_and_condition',
        'type' => 'texarea',
        'required' => 'required',
        'placeholder' => 'please insert term_and_condition limit',
    ],
];
