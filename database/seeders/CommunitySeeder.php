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
                'color' => '#FF6B6B'
            ],
            [
                'name' => 'Cộng đoàn Don Bosco',
                'parent' => ParentCommunity::CHILD,
                'color' => '#5534A5'
            ],
            [
                'name' => 'Cộng đoàn Mẹ Vô Nhiễm',
                'parent' => ParentCommunity::CHILD,
                'color' => '#85586F'
            ],
            [
                'name' => 'Cộng đoàn Gioan Tông Đồ',
                'parent' => ParentCommunity::CHILD,
                'color' => '#AB46D2'
            ],
            [
                'name' => 'Cộng đoàn Đa Minh Savio',
                'parent' => ParentCommunity::CHILD,
                'color' => '#A85CF9'

            ],
            [
                'name' => 'Cộng đoàn Phaolo Trở Lại',
                'parent' => ParentCommunity::CHILD,
                'color' => '#F7FF93'

            ],
            [
                'name' => 'Cộng đoàn Antôn Padua',
                'parent' => ParentCommunity::CHILD,
                'color' => '#4E944F'

            ],
            [
                'name' => 'Cộng đoàn Phanxico Assisi',
                'parent' => ParentCommunity::CHILD,
                'color' => '#F8B400'

            ],
            [
                'name' => 'Cộng đoàn Phanxico Xavie',
                'parent' => ParentCommunity::CHILD,
                'color' => '#363062'

            ],
            [
                'name' => 'Cộng đoàn Cựu SV & GĐCG',
                'parent' => ParentCommunity::CHILD,
                'color' => 'black'

            ],
            [
                'name' => 'Nhóm Que Diêm Sài Gòn',
                'parent' => ParentCommunity::CHILD,
                'color' => 'black'

            ]
        ];
        DB::table('community')->insert($data);
    }
}
