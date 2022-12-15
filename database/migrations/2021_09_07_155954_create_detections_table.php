<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_device')->nullable();
            $table->unsignedBigInteger('id_sensor')->nullable();
            $table->string('positiong',255)->nullable();
            $table->string('neighborhood',100)->nullable();//Barrio
            $table->string('variacionpresion',100)->nullable();
            $table->string('variacionvalvula',100)->nullable();
            $table->string('cause',255)->nullable();
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
        Schema::dropIfExists('detections');
    }
}
