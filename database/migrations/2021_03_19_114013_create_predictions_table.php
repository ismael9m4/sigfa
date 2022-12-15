<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->string('username',255)->nullable();
            $table->string('probability',255)->nullable();
            $table->unsignedBigInteger('fk_pipeline')->nullable();
            $table->foreign('fk_pipeline')->references('id')->on('pipelines')->onDelete('set null');
            $table->boolean('removed')->default(0);
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
        Schema::dropIfExists('predictions');
    }
}
