<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Enums\AdminVerify;
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
                'verify' => AdminVerify::VERIFY,
                'role_code' => AdminRole::SUPPER_ADMIN,
                'community_id' => Community::VHT
            ],
            [
                'name' => 'DaiViet',
                'email' => 'tranvieth21t@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::NOT_VERIFY,
                'role_code' => AdminRole::EDITS,
                'community_id' => Community::DON
            ],
            [
                'name' => 'DaiViet',
                'email' => 'pauldaiviet1@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::VERIFY,
                'role_code' => AdminRole::ADMIN,
                'community_id' => Community::VHT
            ], [
                'name' => 'DaiViet',
                'email' => 'daivietdonBosco@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::VERIFY,
                'role_code' => AdminRole::ADMIN,
                'community_id' => Community::VHT
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
