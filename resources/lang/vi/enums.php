<?php

use App\Enums\Community;
use App\Enums\AdminVerify;
use App\Enums\NewsVerify;
use App\Enums\NotifyVerify;
use App\Enums\BannerVerify;
use App\Enums\NewsHot;
use App\Enums\NewsTag;

return [
    'community' => [
        Community::VHT => 'Vinh Hà Tĩnh',
        Community::DON => 'Don Bosco',
        Community::MVN => 'Mẹ Vô Nhiễm',
        Community::GIOAN => 'Gioan Tông Đồ',
        Community::DAMINH => 'Đa Minh Savio',
        Community::PAUL => 'Phaolo Trở Lạ',
        Community::ANTON => 'Antôn Padua',
        Community::ASSISI => 'Phanxico Assisi',
        Community::XAVIE => 'Phanxico Xavie',
        Community::GIUSE => 'Cựu SV & GĐCG',
        Community::QUEDIEM => 'Que Diêm Sài Gòn',
    ],
    'verify' => [
        AdminVerify::VERIFY => 'Xác thực',
        AdminVerify::NOT_VERIFY => 'Chưa xác thực',
    ],
    'news_verify' => [
        NewsVerify::ALL => 'Tất Cả',
        NewsVerify::VERIFY => 'Đã duyệt',
        NewsVerify::WAIT => 'Chờ duyệt',
        NewsVerify::NOT_VERIFY => 'Chưa duyệt',
    ],
    'news_hot' => [
        NewsHot::ALL => 'Tất cả',
        NewsHot::HOT => 'Tin nổi bật',
        NewsHot::NO_HOT => 'Tin thường',
    ],
    'news_tag' => [
        NewsTag::TL => 'Tâm linh',
        NewsTag::TT => 'Tri thức',
        NewsTag::NK => 'Nối kết',
        NewsTag::KH => 'Tin khác',
    ],
    'notify_verify' => [
        NotifyVerify::VERIFY => 'Đã duyệt',
        NotifyVerify::NOT_VERIFY => 'Chưa duyệt',
    ],
    'couple_verify' => [
        \App\Enums\CoupleVerify::VERIFY => 'Đã duyệt',
        \App\Enums\CoupleVerify::NOT_VERIFY => 'Chưa duyệt',
    ],
    'vocation_verify' => [
        \App\Enums\VocationVerify::VERIFY => 'Đã duyệt',
        \App\Enums\VocationVerify::NOT_VERIFY => 'Chưa duyệt',
    ],
    'banner_verify' => [
        BannerVerify::VERIFY => 'Hiển thị',
        BannerVerify::NOT_VERIFY => 'Không hiển thị',
    ]
];
