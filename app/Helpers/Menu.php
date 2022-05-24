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
                'route' => route('admins.index'),
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
                'route' => route('news.index'),
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
                'name' => trans('message.admin.notify.notify'),
                'route' => route('notify.index'),
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
                'route' => route('banner.index'),
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
            ], [
                'id' => 6,
                'name' => trans('message.admin.couple.couple'),
                'route' => route('couple.index'),
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' => [
                    [
                        'id' => '',
                        'name' => trans('message.admin.couple.list-couple'),
                        'route' => route('couple.index'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.couple.created-couple'),
                        'route' => route('couple.create'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],[
                'id' => 7,
                'name' => trans('message.admin.vocation.vocation'),
                'route' => route('vocation.index'),
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' => [
                    [
                        'id' => '',
                        'name' => trans('message.admin.vocation.list-vocation'),
                        'route' => route('vocation.index'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ],
                    [
                        'id' => '',
                        'name' => trans('message.admin.vocation.created-vocation'),
                        'route' => route('vocation.create'),
                        'parent_id' => 0,
                        'hideRole' => [],
                    ]
                ]
            ],
            [
                'id' => 5,
                'name' => trans('message.admin.community.community'),
                'route' => route('banner.index'),
                'parent_id' => 0,
                'icon' => '<i class="fa-solid fa-people-group"></i>',
                'hideRole' => [],
                'sub-menu' =>
                    $data,
            ],
        ];

    }
}
