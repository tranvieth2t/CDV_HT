<?php

namespace Database\Seeders;

use App\Enums\Community;
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
            ],
            [
                'name' => 'Cộng đoàn Don Bosco',
            ],
            [
                'name' => 'Cộng đoàn Mẹ Vô Nhiễm',
            ],
            [
                'name' => 'Cộng đoàn Gioan Tông Đồ',
            ],
            [
                'name' => 'Cộng đoàn Đa Minh Savio',
            ],
            [
                'name' => 'Cộng đoàn Phaolo Trở Lại',
            ],
            [
                'name' => 'Cộng đoàn Antôn Padua',
            ],
            [
                'name' => 'Cộng đoàn Phanxico Assisi',
            ],
            [
                'name' => 'Cộng đoàn Phanxico Xavie',
            ],
            [
                'name' => 'Cộng đoàn Cựu SV & GĐCG',
            ],
            [
                'name' => 'Nhóm Que Diêm Sài Gòn',
            ],
            [
                'name' => 'Ca đoàn Teresa',
            ],
        ];
        DB::table('community')->insert($data);
    }
}
