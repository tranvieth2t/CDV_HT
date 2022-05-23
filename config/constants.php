<?php

return [
    'per_page_default' => 10,
    'time_show_message' => 3000,
    'time_hide_message' => 500,
    'color_tag' => [
        \App\Enums\NewsTag::TT => '#4B7BE5',
        \App\Enums\NewsTag::NK => '#B4FF9F',
        \App\Enums\NewsTag::TL => '#5534A5',
        \App\Enums\NewsTag::KH => '#FF6363'
        ],
    'role_admin' => [
        \App\Enums\AdminRole::SUPPER_ADMIN => "Quản trị viên",
        \App\Enums\AdminRole::ADMIN => "Kiểm duyệt viên",
        \App\Enums\AdminRole::EDITS => "Biên tập viên"
    ],
    'news_thumbnail_default' => [
        '0' => 'constants/news-0.jpg',
        '1' => 'constants/news-1.jpg',
        '2' => 'constants/news-2.jpg',
        '3' => 'constants/news-3.jpg',
        '4' => 'constants/news-4.jpg',
        '5' => 'constants/news-5.jpg',
        '6' => 'constants/news-6.jpg',
        '7' => 'constants/news-7.jpg',
        '8' => 'constants/news-8.jpg',
        '9' => 'constants/news-9.jpg',
        '10' => 'constants/news-10.jpg',
        '11' => 'constants/news-11.jpg',
    ],
    'notify_thumbnail_default' => 'constants/notify.jpg',
    'banner_thumbnail_default' => 'constants/banner.jpg',
    'community_thumbnail_default' => 'constants/community.jpg',
    'banner_thumbnail_small_default' => 'constants/banner_small.jpg',
    'icon_tag' => [
        \App\Enums\NewsTag::TT => '<i class="fa-solid fa-book-bible"> </i>',
        \App\Enums\NewsTag::NK => '<i class="fa-solid fa-handshake-angle"></i>',
        \App\Enums\NewsTag::TL => '<i class="fa-solid fa-church"></i>',
        \App\Enums\NewsTag::KH => '<i class="fa-solid fa-newspaper"></i>'
    ]
];
