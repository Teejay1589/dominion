<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('settings')) {
            Schema::create('settings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('hospital_logo')->nullable();
                $table->string('hospital_name')->nullable();
                $table->string('hospital_tagline')->nullable();
                $table->string('hospital_address')->nullable();
                $table->string('hospital_phone')->nullable();
                $table->string('hospital_email')->nullable();
                $table->string('sms_username')->nullable();
                $table->string('sms_password')->nullable();
                $table->string('sms_from')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('settings');
    }
}
