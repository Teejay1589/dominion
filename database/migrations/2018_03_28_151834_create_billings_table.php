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
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('admission');
            $table->integer('consultation');
            $table->integer('doctor');
            $table->integer('surgeon');
            $table->integer('operation');
            $table->integer('delivery');
            $table->integer('medicine');
            $table->integer('subtotal');
            $table->integer('vat');
            $table->integer('service');
            $table->integer('total_amount');
            $table->integer('discount');
            $table->integer('total');
            $table->timestamps();
        });
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
