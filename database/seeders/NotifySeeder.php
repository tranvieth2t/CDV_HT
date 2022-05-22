<?php

namespace Database\Seeders;

use App\Enums\NewsHot;
use App\Enums\NewsTag;
use App\Enums\NewsVerify;
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

        $listAdmin = DB::table('admins')->get();
        $listCommunity = DB::table('community')->where('id', 1)->get();
        $jsonString = file_get_contents(base_path('resources/dataOld/notify.json'));
        $json = json_decode($jsonString, true);
        foreach ($json as  $value) {
                DB::table('notify')->insert([
                    'title' => $value['title'],
                    'content' => $value['bodytext'],
                    'thumbnail' => config('constants.notify_thumbnail_default'),
                    'verify' => NotifyVerify::VERIFY,
                    'description' => $value['hometext'],
                    'created_by' => $faker->randomElement($listAdmin)->id,
                    'community_id' => $faker->randomElement($listCommunity)->id,
                    'created_at' => date('Y-m-d H:i:s', $value['addtime']),
                    'updated_at' => date('Y-m-d H:i:s', $value['addtime']),
                ]);
        }
    }
}
