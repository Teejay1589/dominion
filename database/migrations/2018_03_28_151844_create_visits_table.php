<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('visits')) {
            Schema::create('visits', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->index()->nullable();
                $table->unsignedInteger('patient_id')->index();
                $table->string('type');
                $table->string('title');
                $table->text('subjects')->nullable();
                $table->text('objects')->nullable();
                $table->text('assessment')->nullable();
                $table->text('plans')->nullable();
                $table->text('summary')->nullable();
                $table->boolean('successful_delivery')->default(0);
                $table->datetime('admission_date')->nullable();
                $table->datetime('discharged_on')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('visits');
    }
}
