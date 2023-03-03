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
        Schema::create('notifications', function (Blueprint $table) {
            $table->char("id", 36)->nullable(false);
            $table->primary("id");
            $table->string("body", 100)->nullable(false);
            $table->enum("category", ["follow", "answer", "comment"])->nullable(false);
            $table->char("link_id", 36)->nullable(false);
            $table->boolean("is_read")->default(0)->nullable(false);
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
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('notifications');
    }
};
