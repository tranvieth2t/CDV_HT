<?php

namespace Database\Seeders;

use App\Enums\CoupleVerify;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class CoupleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 100;
        $listAdmin = DB::table('admins')->get();
        $listCommunity = DB::table('community')->get();
        $listVerify = [CoupleVerify::VERIFY, CoupleVerify::NOT_VERIFY];
        $date = Carbon::now();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('couple')->insert([
                'male' => $faker->name(),
                'community_male_id' => $faker->randomElement($listCommunity)->id,
                'community_female_id' => $faker->randomElement($listCommunity)->id,
                'female' => $faker->name(),
                'description' => $faker->text(100),
                'content' => $faker->text(100),
                'thumbnail' => config('constants.couple_thumbnail_default'),
                'verify' => $faker->randomElement($listVerify),
                'created_by' =>  $faker->randomElement($listAdmin)->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
