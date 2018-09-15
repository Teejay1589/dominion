<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmsPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sms_patients')) {
            Schema::create('sms_patients', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('sms_id')->nullable()->index();
                $table->unsignedInteger('patient_id')->nullable()->index();
                $table->timestamps();

                $table->foreign('sms_id')->references('id')->on('sms');
                $table->foreign('patient_id')->references('id')->on('patients');
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
        Schema::dropIfExists('sms_patients');
    }
}
