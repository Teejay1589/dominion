<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('visit_doctors')) {
            Schema::create('visit_doctors', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->index()->nullable();
                $table->unsignedInteger('visit_id')->index();
                $table->unsignedInteger('doctor_id')->index();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');
                $table->foreign('doctor_id')->references('id')->on('users');
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
        Schema::dropIfExists('visit_doctors');
    }
}
