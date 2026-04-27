<?php
// validate Login
$validation = [
    'email' => [
        'filter_type' => FILTER_VALIDATE_EMAIL,
        'myOptions' => null,
        'errors' => 'Invalid Email'
    ],
    'password' => [
        'filter_type' => FILTER_VALIDATE_REGEXP,
        'myOptions' => ['options' => ['regexp' => '/^[a-zA-Z0-9]{3,10}$/']],
        'errors' => 'Invalid Password'
    ]
];