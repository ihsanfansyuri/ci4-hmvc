<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'auth'          => \App\Filters\AuthFilter::class,
        'adminfilter'   => \App\Filters\AdminFilter::class,
        'userfilter'    => \App\Filters\UserFilter::class,
        'role'          => \App\Filters\Role::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            'csrf',
            'auth' => [
                'except' => [
                    '/',
                    '/home', 'auth/*',
                ]
            ],
            'role' => [
                'except' => [
                    '/',
                    '/home', 'auth/*',
                    'admin/dashboard',
                    'admin/pembalap', 'admin/pembalap/*',
                    'admin/team', 'admin/team/*',
                    'admin/user', 'admin/user/*',
                    'user/dashboard',
                    'user/pembalap',
                    'user/pembalap/*',
                    'user/team'
                ]
            ],
            'userfilter' => [
                'except' => [
                    '/', '/home',
                    'user/*',
                    'user/dashboard',
                    'auth/*'
                ]
            ]
        ],
        'after' => [
            // 'adminfilter' => [
            //     'except' => [
            //         '/', 'admin/*',
            //     ]
            // ],
            // 'userfilter' => [
            //     'except' => [
            //         '/', 'user/*',
            //     ]
            // ],
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
