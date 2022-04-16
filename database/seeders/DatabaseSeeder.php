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
        $this->call([AdminRoleSeeder::class]);
        $this->call([CommunitySeeder::class]);
        DB::table('admins')->insert([
            [
                'name' => 'DaiViet',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::VERIFY,
                'role_admin' => AdminRole::SUPPER_ADMIN,
                'community_id' => Community::VHT
            ],
            [
                'name' => 'DaiViet',
                'email' => 'tranvieth21t@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::NOT_VERIFY,
                'role_admin' => AdminRole::EDITS,
                'community_id' => Community::DON
            ],
            [
                'name' => 'DaiViet',
                'email' => 'pauldaiviet1@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::VERIFY,
                'role_admin' => AdminRole::ADMIN,
                'community_id' => Community::VHT
            ], [
                'name' => 'DaiViet',
                'email' => 'daivietdonBosco@gmail.com',
                'password' => bcrypt('admin123'),
                'verify' => AdminVerify::VERIFY,
                'role_admin' => AdminRole::ADMIN,
                'community_id' => Community::VHT
            ]
        ]);

        $faker = Faker\Factory::create();
        $limit = 50;
        $listVerify = [AdminVerify::VERIFY, AdminVerify::NOT_VERIFY];
        $listRole =  [AdminRole::EDITS, AdminRole::ADMIN];
        $listCommunity = DB::table('community')->get();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('admins')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'verify' => $faker->randomElement($listVerify),
                'role_admin' => $faker->randomElement($listRole),
                'community_id' => $faker->randomElement($listCommunity)->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

        DB::table('users')->insert([
            [
                'name' => 'DaiViet',
                'email' => 'user@gmail.com',
                'password' => bcrypt('admin123'),
            ]
        ]);

    }
}
