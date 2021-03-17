<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productsphotos', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->string('name')->default('Imagen');
            $table->string('path')->default('images/default.png');
            $table->string('type')->default('portada');
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
        Schema::dropIfExists('productsphotos');
    }
}
