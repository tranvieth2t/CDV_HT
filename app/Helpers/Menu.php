<?php

namespace App\Helpers;


class Menu
{
    public function menus(): array
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
                        'route' => 'admin/index',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.admin.create-admin'),
                        'route' => 'admin/create',
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
                        'route' => 'admin/index',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.users.list-users'),
                        'route' => 'admin/create',
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
        ];

    }
}