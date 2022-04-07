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
                'description' => 'SuperAdmin',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Admin',
                'description' => 'Admin',
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'name' => 'Editor',
                'description' => 'Editor',
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ];
        DB::table('admin_role')->insert($data);
    }
}
