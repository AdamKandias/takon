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
        Schema::create('comments', function (Blueprint $table) {
            $table->char("id", 36)->nullable(false);
            $table->primary("id");
            $table->longText("comment")->nullable(false);
            $table->string("image", 100)->nullable(true);
            $table->foreignUuid("answer_id")->nullable(false);
            $table->foreign("answer_id")->references("id")->on("answers");
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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['answer_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('comments');
    }
};
