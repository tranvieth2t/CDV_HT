<?php

return [
    'per_page_default' => 10,
    'time_show_message' => 3000,
    'time_hide_message' => 500,
    'color_tag' => [
        \App\Enums\NewsTag::TT => 'black',
        \App\Enums\NewsTag::NK => 'yellow',
        \App\Enums\NewsTag::TL => 'violet',
        \App\Enums\NewsTag::KH => 'blue'
        ],
    'news_thumbnail_default' => 'constants/news.jpg',
    'notify_thumbnail_default' => 'constants/notify.jpg',
    'banner_thumbnail_default' => 'constants/banner.jpg',
    'banner_thumbnail_small_default' => 'constants/banner_small.jpg'
];
