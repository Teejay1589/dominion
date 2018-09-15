<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurgeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('surgeries')) {
            Schema::create('surgeries', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->index()->nullable();
                $table->unsignedInteger('visit_id')->index();
                $table->unsignedInteger('surgery_id')->index()->nullable();
                $table->string('surgery_name');
                $table->date('surgery_date')->nullable();
                $table->text('complications')->nullable();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');
                $table->foreign('surgery_id')->references('id')->on('surgeries')->onDelete('cascade');
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
        Schema::dropIfExists('surgeries');
    }
}
