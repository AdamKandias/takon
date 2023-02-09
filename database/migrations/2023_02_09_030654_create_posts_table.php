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
        Schema::create('posts', function (Blueprint $table) {
            $table->char("id", 36)->nullable(false);
            $table->primary("id");
            $table->longText("question")->nullable(false);
            $table->foreignId("mapel_id")->nullable(false);
            $table->foreign("mapel_id")->references("id")->on("mapel");
            $table->foreignId("user_id")->nullable(false);
            $table->foreign("user_id")->references("id")->on("users");
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['mapel_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('posts');
    }
};
