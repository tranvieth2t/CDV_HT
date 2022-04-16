<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Menu
{
    public static function menus(): array
    {
        $listCommunity = getListCommunity();
        $data = [];
        foreach ($listCommunity as $community) {
            $data[] =
                [
                    'id' => '',
                    'name' => $community->name ?? '',
                    'route' => route('community.edit',[ $community->id]),
                    'parent_id' => 0,
                    'hideRole' => [],
                ]
            ;
        }
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
                        'name' => trans('message.admin.news.list-news'),
                        'route' => route('news.index'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.news.created-news'),
                        'route' => route('news.create'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
            [
                'id' => 3,
                'name' => trans('message.admin.community.community'),
                'route' => '#',
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' =>
                    $data,
            ],
        ];

    }
}
