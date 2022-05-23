<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocation', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('thumbnail')->default(config('constants.vocation_thumbnail_default'));
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->dateTime('date_time')->nullable();
            $table->tinyInteger('verify')->default(\App\Enums\VocationVerify::NOT_VERIFY);
            $table->integer('community_id')->nullable()->unsigned();
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('admins');
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
        Schema::dropIfExists('vocation');
    }
}
