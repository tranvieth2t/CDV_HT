<?php

namespace Database\Seeders;

use App\Enums\NotifyVerify;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class NotifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 1000;
        $listAdmin = DB::table('admins')->get();
        $listCommunity = DB::table('community')->get();
        $listVerify = [NotifyVerify::VERIFY, NotifyVerify::NOT_VERIFY];
        for ($i = 0; $i < $limit; $i++) {
            DB::table('notify')->insert([
                'title' => $faker->text(100),
                'content' => $faker->text,
                'thumbnail' => config('constants.notify_thumbnail_default'),
                'verify' => $faker->randomElement($listVerify),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'created_by' =>  $faker->randomElement($listAdmin)->id,
                'community_id' => $faker->randomElement($listCommunity)->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
