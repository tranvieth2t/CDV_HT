<?php

namespace Database\Seeders;

use App\Enums\BannerVerify;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class BannerSeeder extends Seeder
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
        $listVerify = [BannerVerify::VERIFY, BannerVerify::NOT_VERIFY];
        $date = Carbon::now();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('banner')->insert([
                'title' => $faker->text(100),
                'thumbnail' => config('constants.banner_thumbnail_default'),
                'thumbnail_small' => config('constants.banner_thumbnail_small_default'),
                'verify' => $faker->randomElement($listVerify),
                'created_by' =>  $faker->randomElement($listAdmin)->id,
                'start_date' => $date->addDays(rand(1, 52)),
                'end_date' => $date->addWeeks(rand(52, 100)),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
