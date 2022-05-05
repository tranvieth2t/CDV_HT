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
    'news_thumbnail_default' => 'constants/news.jpg',
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
