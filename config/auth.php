<?php

return [

    'defaults' => [
        'guard' => 'web', // Guard mặc định, có thể đổi thành 'customers' nếu khách hàng là người dùng chính.
        'passwords' => 'users', // Password reset mặc định.
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'customers' => [ // Guard cho khách hàng
            'driver' => 'session',
            'provider' => 'customers',
        ],

        'customer_staff' => [ // Guard cho nhân viên quản lý khách hàng
            'driver' => 'session',
            'provider' => 'customer_staff',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        'customers' => [ // Provider cho khách hàng
            'driver' => 'eloquent',
            'model' => App\Models\Customers::class,
        ],

        'customer_staff' => [ // Provider cho nhân viên quản lý khách hàng
            'driver' => 'eloquent',
            'model' => App\Models\CustomerStaff::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'customers' => [ // Reset password cho khách hàng
            'provider' => 'customers',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],

        'customer_staff' => [ // Reset password cho nhân viên quản lý khách hàng
            'provider' => 'customer_staff',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];