<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->year('year')->nullable();
            $table->time('hour')->nullable();
            $table->date('date')->nullable();
            $table->decimal('value',10,4)->nullable();
            $table->string('unit',100)->nullable();
            $table->string('details')->nullable();
            $table->unsignedBigInteger('fk_sensor')->nullable();
            $table->foreign('fk_sensor')->references('id')->on('sensors')->onDelete('set null');
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
        Schema::dropIfExists('readings');
    }
}
