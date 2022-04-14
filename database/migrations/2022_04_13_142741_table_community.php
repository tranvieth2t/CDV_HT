<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableCommunity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('tel', 255)->nullable();
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
        Schema::dropIfExists('community');
    }
}
