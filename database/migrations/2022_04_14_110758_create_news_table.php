<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\NewsHot;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->string('title', 255);
            $table->string('thumbnail')->default(config('constants.news_thumbnail_default.0'));
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('verify')->default(\App\Enums\NewsVerify::NOT_VERIFY);
            $table->tinyInteger('tag')->nullable()->default(\App\Enums\NewsTag::KH);
            $table->tinyInteger('hot')->default(NewsHot::NO_HOT);
            $table->integer('community_id')->nullable()->unsigned();
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('admins');
            $table->integer('censors')->unsigned()->nullable();
            $table->foreign('censors')->references('id')->on('admins');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->foreign('community_id')->references('id')->on('community');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
