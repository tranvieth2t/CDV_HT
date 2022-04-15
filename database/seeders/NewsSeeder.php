<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 500;
        $listAdmin = DB::table('admins')->get();
        $listAdminCensor = DB::table('admins')->where('role_admin', AdminRole::ADMIN)->get();
        $listCommunity = DB::table('community')->get();
        $listVerify = [0,1];
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'title' => $faker->name,
                'content' => $faker->text,
                'verify' => $faker->randomElement($listVerify),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'created_by' =>  $faker->randomElement($listAdmin)->id,
                'censors' =>  $faker->randomElement($listAdminCensor)->id,
                'community_id' => $faker->randomElement($listCommunity)->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
