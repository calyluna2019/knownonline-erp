<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_product', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->string('uniqueId',255);
            $table->string('productId',255);
            $table->string('refId',255)->nullable();
            $table->bigInteger('precio');
            $table->bigInteger('precio_lista');
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
        Schema::dropIfExists('_product');
    }
}
