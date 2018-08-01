<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('billings')) {
            Schema::create('billings', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->index()->nullable();
                // $table->unsignedInteger('patient_id')->index()->nullable();
                $table->unsignedInteger('visit_id')->index()->nullable();
                // $table->unsignedInteger('surgery_id')->index()->nullable();
                $table->string('billing_name')->nullable();
                $table->float('amount');
                $table->float('discount')->nullable();
                $table->float('total')->nullable();
                $table->boolean('is_paid')->default(0);
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                // $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
                $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');
                // $table->foreign('surgery_id')->references('id')->on('surgeries')->onDelete('cascade');
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
        Schema::dropIfExists('billings');
    }
}
