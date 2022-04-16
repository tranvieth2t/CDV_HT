<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Enums\AdminVerify;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
