<?php
use App\Enums\Community;
use App\Enums\AdminVerify;
use App\Enums\NewsVerify;
return [
    'community' => [
        Community::VHT      => 'Vinh Hà Tĩnh',
        Community::DON      => 'Don Bosco',
        Community::MVN      => 'Mẹ Vô Nhiễm',
        Community::GIOAN    => 'Gioan Tông Đồ',
        Community::DAMINH   => 'Đa Minh Savio',
        Community::PAUL     => 'Phaolo Trở Lạ',
        Community::ANTON    => 'Antôn Padua',
        Community::ASSISI   => 'Phanxico Assisi',
        Community::XAVIE    => 'Phanxico Xavie',
        Community::GIUSE    => 'Cựu SV & GĐCG',
        Community::QUEDIEM  => 'Que Diêm Sài Gòn',
        ],
    'verify' => [
        AdminVerify::VERIFY => 'Xác thực',
        AdminVerify::NOT_VERIFY => 'Chưa xác thực'
    ],
    'news_verify' => [
        NewsVerify::VERIFY => 'Đã duyệt',
        NewsVerify::NOT_VERIFY => 'Chưa duyệt'
    ]
];
