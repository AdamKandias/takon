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
        Schema::create('comment_reports', function (Blueprint $table) {
            $table->foreignUuid("comment_id");
            $table->foreign("comment_id")->references("id")->on("comments");
            $table->foreignUuid("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->primary(['comment_id', 'user_id']);
            $table->string("description", 100)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_reports', function (Blueprint $table) {
            $table->dropForeign(['comment_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('comment_reports');
    }
};
