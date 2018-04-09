<?php

return [
    [
        'name' => 'customer_code',
        'label' => 'customer_code',
        'id' => 'customer_code',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert customer_code',
    ], [
        'name' => 'name',
        'label' => 'name',
        'id' => 'name',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert name',
    ], [
        'name' => 'email',
        'label' => 'email',
        'id' => 'email',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert email',
    ], [
        'name' => 'mobile_phone',
        'label' => 'mobile_phone',
        'id' => 'mobile_phone',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert mobile_phone',
    ], [
        'name' => 'identification',
        'label' => 'identification',
        'id' => 'identification',
        'type' => 'text',
        'required' => 'required',
        'placeholder' => 'please insert identification',
    ],

    [
        'name' => 'level',
        'label' => 'level',
        'id' => 'level',
        'type' => 'select',
        'placeholder' => 'please select level',
        'select' => [
            'displayname' => 'select level',
            'list' => [
                'Regular' => 'Regular',
                'Platinum' => 'Platinum',
                'Prestige' => 'Prestige',
            ],
        ],
    ], [
        'name' => 'status',
        'label' => 'status',
        'id' => 'status',
        'type' => 'select',
        'placeholder' => 'please select status',
        'select' => [
            'displayname' => 'select status',
            'list' => [
                'active' => 'active',
                'cancel' => 'cancel',
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
