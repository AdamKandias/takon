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
        Schema::create('answers', function (Blueprint $table) {
            $table->char("id", 36)->nullable(false);
            $table->primary("id");
            $table->longText("answer")->nullable(false);
            $table->string("image", 60)->nullable(true);
            $table->foreignUuid("post_id")->nullable(false);
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreignUuid("user_id")->nullable(false);
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
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('answers');
    }
};
