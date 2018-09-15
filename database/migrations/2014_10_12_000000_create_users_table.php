<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('email')->unique();
                $table->string('password');
                $table->unsignedInteger('role_id')->index();
                $table->string('identity_number', 60)->nullable();
                $table->enum('gender', ['MALE', 'FEMALE']);
                $table->date('date_of_birth')->nullable();
                $table->string('phone')->nullable();
                $table->string('address')->nullable();
                $table->string('state')->nullable();
                $table->string('country')->nullable();
                $table->string('job')->nullable();
                $table->string('profile_picture')->default('img/default.png');
                $table->string('cv')->nullable();
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('role_id')->references('id')->on('roles');
            });
        }
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
}
