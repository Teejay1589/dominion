<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('patient_id')->index();
            $table->string('title');
            $table->text('symptoms')->nullable();
            $table->text('treatment')->nullable();
            $table->text('medicine')->nullable();
            $table->boolean('is_consultation')->default(0);
            $table->boolean('is_emergency')->default(0);
            $table->boolean('is_delivery')->default(0);
            $table->boolean('is_success')->default(0);
            $table->datetime('discharged_on')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cases');
    }
}
