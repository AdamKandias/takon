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
            $table->char("nisn", 10)->nullable(false);
            $table->date("birthdate")->nullable(true);
            $table->char("password", 60)->nullable(true);
            $table->unsignedInteger("point")->nullable(true);
            $table->string("image", 100)->nullable(false);
            $table->foreignId("status_id")->nullable(false);
            $table->foreign("status_id")->references("id")->on("statusses");
            $table->foreignId("role_id")->nullable(true);
            $table->foreign("role_id")->references("id")->on("roles");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
