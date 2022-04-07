<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRoleSeeder extends Seeder
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
                'name' => 'Admin',
                'role_code' => AdminRole::SUPPER_ADMIN,
                'description' => 'SuperAdmin',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Admin',
                'role_code' => AdminRole::ADMIN,
                'description' => 'Admin',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Editor',
                'role_code' => AdminRole::EDITS,
                'description' => 'Editor',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];
        DB::table('admin_role')->insert($data);
    }
}
