<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Menu
{
    public static function menus(): array
    {
        $listCommunity = getListCommunityByRoleId();
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
                        'route' =>  route('admins.index'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
//            [
//                'id' => 1,
//                'name' => trans('message.admin.users.user'),
//                'route' => '#',
//                'parent_id' => 0,
//                'icon' => '<i class="fa-solid fa-people-group"></i>',
//                'hideRole' => [],
//                'sub-menu' => [
//                    [
//                        'id' => '',
//                        'name' => trans('message.admin.users.edit-user'),
//                        'route' => 'admin/index',
//                        'parent_id' => 0,
//                        'hideRole' => [],
//                    ],
//                    [
//                        'id' => '',
//                        'name' => trans('message.admin.users.list-users'),
//                        'route' => 'admin/user',
//                        'parent_id' => 0,
//                        'hideRole' => [],
//                    ]
//                ]
//            ],
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
                        'name' => trans('message.admin.news.list-news_not_verify'),
                        'route' => route('news-verify'),
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
                'name' => trans('message.admin.notify.notify'),
                'route' => '#',
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' => [
                    [
                        'id' => '',
                        'name' => trans('message.admin.notify.list-notify'),
                        'route' => route('notify.index'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.notify.created-notify'),
                        'route' => route('notify.create'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
            [
                'id' => 4,
                'name' => trans('message.admin.banner.banner'),
                'route' => '#',
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' => [
                    [
                        'id' => '',
                        'name' => trans('message.admin.banner.list-banner'),
                        'route' => route('banner.index'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.banner.created-banner'),
                        'route' => route('banner.create'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
            [
                'id' => 5,
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
