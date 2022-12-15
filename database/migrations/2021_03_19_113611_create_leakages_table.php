<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeakagesTable extends Migration
{
    public function up()
    {
        Schema::create('leakages', function (Blueprint $table) {
            $table->id();
            $table->string('stimad_less',100)->nullable();
            $table->dateTime('datetime')->nullable();
            $table->string('cause',255)->nullable();
            $table->string('details',255)->nullable();
            $table->unsignedBigInteger('fk_category')->nullable();
            $table->foreign('fk_category')->references('id')->on('categories')->onDelete('set null');
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
        Schema::dropIfExists('leakages');
    }
}
