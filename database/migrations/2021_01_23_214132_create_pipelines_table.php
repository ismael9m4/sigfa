<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipelines', function (Blueprint $table) {
            $table->id();
            $table->string('positiong',255)->nullable();
            $table->string('country',100);
            $table->string('province',100);
            $table->string('location',100)->nullable();
            $table->string('neighborhood',100)->nullable();//Barrio
            $table->string('district',100)->nullable();
            $table->string('material',100)->nullable();
            $table->string('diameter',100)->nullable();
            $table->string('thickness',100)->nullable();
            $table->string('length',100)->nullable();
            $table->string('depth_earth',100)->nullable();
            $table->string('type_cover',100)->nullable();
            $table->string('life_time',100)->nullable();
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
        Schema::dropIfExists('pipelines');
    }
}
