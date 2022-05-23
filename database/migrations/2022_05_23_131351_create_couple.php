<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouple extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couple', function (Blueprint $table) {
            $table->id();
            $table->string('male', 255);
            $table->integer('community_male_id')->nullable()->unsigned();
            $table->string('female', 255);
            $table->integer('community_female_id')->nullable()->unsigned();
            $table->string('thumbnail')->default(config('constants.couple_thumbnail_default'));
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('date_wedding')->nullable();
            $table->tinyInteger('verify')->default(\App\Enums\CoupleVerify::NOT_VERIFY);
            $table->foreign('community_male_id')->references('id')->on('community');
            $table->foreign('community_female_id')->references('id')->on('community');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('admins');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('couple');
    }
}
