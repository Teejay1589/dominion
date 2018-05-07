<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->enum('gender', ['MALE', 'FEMALE'])->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('next_of_kin')->nullable();
            $table->string('next_of_kin_telephone')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('genotype')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
