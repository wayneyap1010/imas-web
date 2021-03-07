<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('clock', 10)->nullable();
            $table->date('mobile_date')->nullable();
            $table->time('mobile_time')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->string('timestamp')->nullable();
            $table->string('accuracy')->nullable();
            $table->string('altitude')->nullable();
            $table->string('heading')->nullable();
            $table->string('speed')->nullable();
            $table->string('speed_accuracy')->nullable();
            $table->string('is_mocked')->nullable();
            $table->string('house_no')->nullable();
            $table->string('street')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('street_name')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
