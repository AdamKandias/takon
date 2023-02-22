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
        Schema::create('answer_reports', function (Blueprint $table) {
            $table->foreignUuid("answer_id");
            $table->foreign("answer_id")->references("id")->on("answers");
            $table->foreignUuid("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->primary(['answer_id', 'user_id']);
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
        Schema::table('answer_reports', function (Blueprint $table) {
            $table->dropForeign(['answer_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('answer_reports');
    }
};
