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
        if (!Schema::hasTable('patients')) {
            Schema::create('patients', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->index()->nullable();
                $table->string('file_number');
                $table->string('passport')->default('img/default.png');
                $table->string('first_name');
                $table->string('last_name')->nullable();
                $table->string('phone_number');
                $table->string('email')->nullable();
                $table->string('sex')->nullable();
                $table->string('marital_status')->nullable();
                $table->date('date_of_birth')->nullable();
                $table->string('religion')->nullable();
                $table->string('address')->nullable();
                $table->string('nationality')->nullable();
                $table->string('state_of_origin')->nullable();
                $table->string('LGA')->nullable();
                $table->string('occupation')->nullable();
                $table->string('office_address')->nullable();
                $table->string('next_of_kin_name')->nullable();
                $table->string('next_of_kin_relationship')->nullable();
                $table->string('next_of_kin_address')->nullable();
                $table->string('next_of_kin_phone_number')->nullable();
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
