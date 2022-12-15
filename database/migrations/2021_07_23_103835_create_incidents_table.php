<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('description',255)->nullable();
            $table->string('severity',1);
            $table->boolean('removed')->default(0);
            $table->dateTime('date')->nullable();
            $table->unsignedBigInteger('fk_level')->nullable();
            $table->foreign('fk_level')->references('id')->on('levels')->onDelete('set null');

            $table->unsignedBigInteger('fk_client')->nullable();
            $table->foreign('fk_client')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('fk_support')->nullable();
            $table->foreign('fk_support')->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('incidents');
    }
}
