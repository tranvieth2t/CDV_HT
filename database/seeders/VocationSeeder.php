<?php

namespace Database\Seeders;

use App\Enums\CoupleVerify;
use App\Enums\VocationVerify;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class VocationSeeder extends Seeder
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
        $listVerify = [VocationVerify::VERIFY, VocationVerify::NOT_VERIFY];
        $date = Carbon::now();
        for ($i = 0; $i < $limit; $i++) {
            DB::table('vocation')->insert([
                'title' => $faker->text(100),
                'community_id' => $faker->randomElement($listCommunity)->id,
                'description' => $faker->text(100),
                'content' => $faker->text(100),
                'thumbnail' => config('constants.vocation_thumbnail_default'),
                'verify' => $faker->randomElement($listVerify),
                'created_by' =>  $faker->randomElement($listAdmin)->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
