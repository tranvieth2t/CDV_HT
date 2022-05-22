<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Enums\AdminVerify;
use App\Enums\Community;
use Database\Seeders\AdminRoleSeeder;
use Database\Seeders\CommunitySeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CommunitySeeder::class]);
        $this->call([AdminRoleSeeder::class]);
        DB::table('admins')->insert([
            [
                'name' => 'DaiViet',
                'email' => 'tranvieth2t@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::VERIFY,
                'role_admin' => AdminRole::SUPPER_ADMIN,
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

    }
}
