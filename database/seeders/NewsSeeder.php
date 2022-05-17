<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Enums\NewsHot;
use App\Enums\NewsTag;
use App\Enums\NewsVerify;
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

        $limit = 1000;
        $listAdmin = DB::table('admins')->get();
        $listAdminCensor = DB::table('admins')->where('role_admin', AdminRole::ADMIN)->get();
        $listCommunity = DB::table('community')->get();
        $listVerify = [NewsVerify::VERIFY, NewsVerify::NOT_VERIFY, NewsVerify::WAIT];
        $listHot = [NewsHot::HOT, NewsHot::NO_HOT];
        $listNewsTag = [NewsTag::KH, NewsTag::TL, NewsTag::NK , NewsTag::TT];
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'title' => $faker->text(100),
                'content' => $faker->text,
                'thumbnail' => config('constants.news_thumbnail_default'),
                'verify' => $faker->randomElement($listVerify),
                'tag' => $faker->randomElement($listNewsTag),
                'hot' => $faker->randomElement($listHot),
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
