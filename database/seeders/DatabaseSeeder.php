<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\AdminRoleSeeder;

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
                'role_code' => AdminRole::SUPPER_ADMIN
            ],
            [
                'name' => 'DaiViet',
                'email' => 'tranvieth2t@gmail.com',
                'password' => bcrypt('admin123'),
                'role_code' => AdminRole::EDITS
            ],
            [
                'name' => 'DaiViet',
                'email' => 'pauldaiviet@gmail.com',
                'password' => bcrypt('admin123'),
                'role_code' => AdminRole::ADMIN
            ], [
                'name' => 'DaiViet',
                'email' => 'daivietdonBosco@gmail.com',
                'password' => bcrypt('admin123'),
                'role_code' => AdminRole::ADMIN
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
    }
}
