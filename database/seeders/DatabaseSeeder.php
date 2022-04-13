<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Enums\Community;
use Database\Seeders\AdminRoleSeeder;
use Database\Seeders\CommunitySeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'DaiViet',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role_code' => AdminRole::SUPPER_ADMIN,
                'community_id' => Community::VHT
            ],
            [
                'name' => 'DaiViet',
                'email' => 'tranvieth21t@gmail.com',
                'password' => bcrypt('admin123'),
                'role_code' => AdminRole::EDITS,
                'community_id' => Community::DON
            ],
            [
                'name' => 'DaiViet',
                'email' => 'pauldaiviet@gmail.com',
                'password' => bcrypt('admin123'),
                'role_code' => AdminRole::ADMIN,
                'community_id' => Community::MVN
            ], [
                'name' => 'DaiViet',
                'email' => 'daivietdonBosco@gmail.com',
                'password' => bcrypt('admin123'),
                'role_code' => AdminRole::ADMIN,
                'community_id' => Community::DON
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'DaiViet',
                'email' => 'user@gmail.com',
                'password' => bcrypt('admin123'),
            ]
        ]);
        $this->call([AdminRoleSeeder::class]);
        $this->call([CommunitySeeder::class]);
    }
}
