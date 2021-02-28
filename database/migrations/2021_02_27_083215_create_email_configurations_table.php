<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_configurations', function (Blueprint $table) {
            $table->id();
            $table->string('smtp_server')->nullable();
            $table->string('smtp_port', 10)->nullable();
            $table->string('email_account')->nullable();
            $table->string('email_password')->nullable();
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
        Schema::dropIfExists('email_configurations');
    }
}
