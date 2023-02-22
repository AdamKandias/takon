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
        Schema::create('post_reports', function (Blueprint $table) {
            $table->foreignUuid("post_id");
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreignUuid("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->primary(['post_id', 'user_id']);
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
        Schema::table('post_reports', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('post_reports');
    }
};
