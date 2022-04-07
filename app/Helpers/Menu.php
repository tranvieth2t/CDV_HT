<?php

namespace App\Helpers;


class Menu
{
    public static function menus(): array
    {
        return [
            [
                'id' => 0,
                'name' => trans('message.admin.admin.admin'),
                'route' => '#',
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' => [
                    [
                        'id' => '',
                        'name' => trans('message.admin.admin.list-admin'),
                        'route' => '/admin/admins',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.admin.create-admin'),
                        'route' => 'admin/admins/create',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
            [
                'id' => 1,
                'name' => trans('message.admin.users.user'),
                'route' => '#',
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' => [
                    [
                        'id' => '',
                        'name' => trans('message.admin.users.edit-user'),
                        'route' => 'admins/index',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.users.list-users'),
                        'route' => 'admins/create',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => trans('message.admin.news.news'),
                'route' => '#',
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' => [
                    [
                        'id' => '',
                        'name' => trans('message.admin.news.created-news'),
                        'route' => 'admin/index',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.news.list-news'),
                        'route' => 'admin/create',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
        ];

    }
}
