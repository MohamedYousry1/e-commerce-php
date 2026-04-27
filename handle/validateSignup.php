<?php
// validate Signup
$validation = [
    'username' => [
        'filter_type' => FILTER_VALIDATE_REGEXP,
        'myOptions' => ['options' => ['regexp' => '/^[a-zA-Z0-9]{3,100}$/']],
        'errors' => 'Invalid username'
    ],
    'email' => [
        'filter_type' => FILTER_VALIDATE_EMAIL,
        'myOptions' => null,
        'errors' => 'Invalid Email'
    ],
    'password' => [
        'filter_type' => FILTER_VALIDATE_REGEXP,
        'myOptions' => ['options' => ['regexp' => '/^[a-zA-Z0-9]{3,100}$/']],
        'errors' => 'Invalid Password'
    ],
    'phone' => [
        'filter_type' => FILTER_VALIDATE_REGEXP,
        'myOptions' => ['options' => ['regexp' => '/^\+?[0-9]{7,15}$/']],
        'errors' => 'Invalid Phone Number'
    ],
];