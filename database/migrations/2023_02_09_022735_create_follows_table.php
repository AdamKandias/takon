<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->foreignUuid("following_user_id");
            $table->foreign("following_user_id")->references("id")->on("users");
            $table->foreignUuid("followed_user_id");
            $table->foreign("followed_user_id")->references("id")->on("users");
            $table->primary(['following_user_id', 'followed_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('follows', function (Blueprint $table) {
            $table->dropForeign(['following_user_id']);
            $table->dropForeign(['followed_user_id']);
        });
        Schema::dropIfExists('follows');
    }
};
