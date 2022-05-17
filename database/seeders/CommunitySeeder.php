<?php

namespace Database\Seeders;

use App\Enums\Community;
use App\Enums\ParentCommunity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Cộng đoàn Vinh - Hà Tĩnh',
                'parent' => ParentCommunity::PARENT,
            ],
            [
                'name' => 'Cộng đoàn Don Bosco',
                'parent' => ParentCommunity::CHILD,
            ],
            [
                'name' => 'Cộng đoàn Mẹ Vô Nhiễm',
                'parent' => ParentCommunity::CHILD,
            ],
            [
                'name' => 'Cộng đoàn Gioan Tông Đồ',
                'parent' => ParentCommunity::CHILD,
            ],
            [
                'name' => 'Cộng đoàn Đa Minh Savio',
                'parent' => ParentCommunity::CHILD,

            ],
            [
                'name' => 'Cộng đoàn Phaolo Trở Lại',
                'parent' => ParentCommunity::CHILD,

            ],
            [
                'name' => 'Cộng đoàn Antôn Padua',
                'parent' => ParentCommunity::CHILD,

            ],
            [
                'name' => 'Cộng đoàn Phanxico Assisi',
                'parent' => ParentCommunity::CHILD,

            ],
            [
                'name' => 'Cộng đoàn Phanxico Xavie',
                'parent' => ParentCommunity::CHILD,

            ],
            [
                'name' => 'Cộng đoàn Cựu SV & GĐCG',
                'parent' => ParentCommunity::CHILD,

            ],
            [
                'name' => 'Nhóm Que Diêm Sài Gòn',
                'parent' => ParentCommunity::CHILD,

            ]
        ];
        DB::table('community')->insert($data);
    }
}
