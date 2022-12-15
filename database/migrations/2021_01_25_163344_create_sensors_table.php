<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->string('state',100);
            $table->string('condition_sensor',100);
            $table->string('type',100);
            $table->string('description',255);
            $table->boolean('removed')->default(0);
            $table->unsignedBigInteger('fk_device')->nullable();
            $table->foreign('fk_device')->references('id')->on('devices')->onDelete('set null');
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
        Schema::dropIfExists('sensors');
    }
}
