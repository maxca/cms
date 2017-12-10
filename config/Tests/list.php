<?php
return [
    [
        'name' => 'id',
        'label' => 'id',
        'id' => 'id',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert id',
    ], [
        'name' => 'name',
        'label' => 'name',
        'id' => 'name',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert name',
    ],
    [
        'name' => 'created_at',
        'label' => 'created_at',
        'id' => 'created_at',
        'type' => 'daterange',
        'required' => 'required',
        'placeholder' => 'please insert created_at',
    ],
    [
        'name' => 'status',
        'label' => 'status',
        'id' => 'status',
        'type' => 'select',
        'placeholder' => 'please select status',
        'select' => [
            'displayname' => 'select status',
            'list' => [
                'pending' => 'pending',
                'process' => 'process',
                'cancel' => 'cancel',
                'success' => 'success',
                'expire' => 'expire',
            ],
        ],
    ],
];
