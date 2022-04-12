<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyVerifyTokenActiveTableAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('verify_token')->nullable();
            $table->tinyInteger('verify')
                ->default(\App\Enums\AdminVerify::NOT_VERIFY)->comment('1: verify, 2: not_verify,');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropIfExists('verify_token');
            $table->dropIfExists('verify');
        });
    }
}
