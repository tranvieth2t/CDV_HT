<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Enums\NewsHot;
use App\Enums\NewsTag;
use App\Enums\NewsVerify;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;
use File;
use Illuminate\Support\Facades\Auth;

class News_Community_1_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $listAdmin = DB::table('admins')->get();
        $listCommunity = DB::table('community')->where('id', 1)->get();
        $table = [
            'resources/dataOld/community_1_1.json',
            'resources/dataOld/community_1_8.json',
            'resources/dataOld/community_1_35.json',
            'resources/dataOld/community_1_37.json',

        ];
        foreach ($table as $value_) {
            $jsonString = file_get_contents(base_path($value_));
            $json = json_decode($jsonString, true);
            foreach ($json as $value) {
                DB::table('news')->insert([
                    'title' => $value['title'],
                    'content' => $value['bodytext'],
                    'thumbnail' => config('constants.news_thumbnail_default.1'),
                    'verify' => NewsVerify::VERIFY ,
                    'tag' => NewsTag::KH,
                    'hot' => NewsHot::NO_HOT,
                    'description' =>$value['hometext'],
                    'created_by' =>  $faker->randomElement($listAdmin)->id,
                    'censors' =>  null,
                    'community_id' => $faker->randomElement($listCommunity)->id,
                    'created_at' => date('Y-m-d H:i:s', $value['addtime']),
                    'updated_at' => date('Y-m-d H:i:s', $value['addtime']),
                ]);
            }
        }
    }
}
