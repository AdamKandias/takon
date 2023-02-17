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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100)->nullable(false);
            $table->char("nisn", 10)->nullable(false);
            $table->date("birthdate")->nullable(true);
            $table->char("password", 60)->nullable(true);
            $table->unsignedSmallInteger("point")->nullable(true);
            $table->string("image", 60)->nullable(false);
            $table->unsignedTinyInteger("status_id")->nullable(false);
            $table->foreign("status_id")->references("id")->on("statusses");
            $table->unsignedTinyInteger("role_id")->nullable(true);
            $table->foreign("role_id")->references("id")->on("roles");
            $table->unsignedTinyInteger("class_id")->nullable(true);
            $table->foreign("class_id")->references("id")->on("classes");
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropForeign(['role_id']);
            $table->dropForeign(['class_id']);
        });
        Schema::dropIfExists('users');
    }
};
