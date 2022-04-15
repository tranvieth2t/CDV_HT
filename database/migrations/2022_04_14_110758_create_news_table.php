<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->text('thumbnail');
            $table->text('description');
            $table->text('content');
            $table->tinyInteger('verify');
            $table->integer('community_id')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('admins');
            $table->integer('censors')->unsigned()->nullable();
            $table->foreign('censors')->references('id')->on('admins');
            $table->integer('updated_by');
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
