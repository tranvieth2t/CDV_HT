<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Enums\NewsHot;
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
        for ($i = 0; $i < $limit; $i++) {
            DB::table('news')->insert([
                'title' => $faker->text(100),
                'content' => $faker->text,
                'thumbnail' => 'https://scontent.fhan5-11.fna.fbcdn.net/v/t39.30808-6/279212253_5116436638403439_4997386856998315697_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=730e14&_nc_ohc=CBYIlze5ACgAX9Vh60n&_nc_ht=scontent.fhan5-11.fna&oh=00_AT9SIG_gGEblV0i-dkiqJmx0rMAAiLCqN_0LjJLMWB1UOA&oe=626CFEF1',
                'verify' => $faker->randomElement($listVerify),
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
