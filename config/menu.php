<?php

return [
    'menu' => [
        'index'          => [
            'display'    => '后台首页',
            'url'        => '#/home',
            'icon'       => 'fa fa-home',
            'permission' => [],
        ],
        'admin/category' => [
            'display'    => '分类管理',
            'url'        => '#/category',
            'icon'       => 'fa fa-sitemap',
            'permission' => 'LIST_CATEGORY',
        ],
        'admin/system'   => [
            'display'    => '系统管理',
            'url'        => '#',
            'icon'       => 'fa fa-gear',
            'permission' => ['LIST_ADMIN', 'LIST_ROLE', 'LIST_PERMISSION'],
            'children'   => [
                'admin/system/user'       => [
                    'controller' => 'App\Http\Controllers\Admin\System\UserController',
                    'url'        => '#/system/user',
                    'permission' => 'LIST_ADMIN',
                    'display'    => '管理员',
                    'method'     => [
                        'index' => ['display' => '管理员列表', 'url' => '/admin/system/user', 'permission' => 'LIST_ADMIN'],
                    ],
                ],
                'admin/system/role'       => [
                    'controller' => 'App\Http\Controllers\Admin\System\RoleController',
                    'url'        => '#/system/role',
                    'permission' => 'LIST_ROLE',
                    'display'    => '角色',
                    'method'     => [
                        'index' => ['display' => '角色列表', 'url' => '/admin/system/role', 'permission' => 'LIST_ROLE'],
                    ],
                ],
                'admin/system/permission' => [
                    'controller' => 'App\Http\Controllers\Admin\System\PermissionController',
                    'url'        => '#/system/permission',
                    'permission' => 'LIST_PERMISSION',
                    'display'    => '权限',
                    'method'     => [
                        'index' => ['display' => '权限列表', 'url' => '/admin/system/permission', 'permission' => 'LIST_PERMISSION'],
                    ],
                ],
            ],
        ],
        // 'admin/member'   => [
        //     'display'    => '会员管理',
        //     'url'        => '#/member',
        //     'icon'       => 'fa fa-user',
        //     'permission' => 'LIST_CATEGORY',
        // ],
        // 'admin/market'   => [
        //     'display'    => '营销管理',
        //     'url'        => "javascript:alert('该功能正在开发中')",
        //     'icon'       => 'fa fa-list-alt',
        //     'permission' => 'LIST_CATEGORY',
        // ],
        // 'admin/shop'     => [
        //     'display'    => '电商管理',
        //     'url'        => "javascript:alert('该功能正在开发中')",
        //     'icon'       => 'fa fa-shopping-cart',
        //     'permission' => 'LIST_CATEGORY',
        // ],
        // 'admin/pay'      => [
        //     'display'    => '支付管理',
        //     'url'        => "javascript:alert('该功能正在开发中')",
        //     'icon'       => 'fa fa-credit-card',
        //     'permission' => 'LIST_CATEGORY',
        // ],
        // 'admin/operate'  => [
        //     'display'    => '运营管理',
        //     'url'        => "javascript:alert('该功能正在开发中')",
        //     'icon'       => 'fa fa-tag',
        //     'permission' => 'LIST_CATEGORY',
        // ],
    ],
];
