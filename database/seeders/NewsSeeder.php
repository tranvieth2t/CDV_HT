<?php

namespace Database\Seeders;


use Database\Seeders\News_Community_1_Seeder;
use Database\Seeders\News_Community_2_Seeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([News_Community_1_Seeder::class]);
        $this->call([News_Community_2_Seeder::class]);
        $this->call([News_Community_3_Seeder::class]);
        $this->call([News_Community_4_Seeder::class]);
        $this->call([News_Community_5_Seeder::class]);
        $this->call([News_Community_6_Seeder::class]);
        $this->call([News_Community_7_Seeder::class]);
        $this->call([News_Community_8_Seeder::class]);
        $this->call([News_Community_9_Seeder::class]);
        $this->call([News_Community_10_Seeder::class]);
    }
}
