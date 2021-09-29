<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_client', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->string('apellido',255);
            $table->string('email',255);
            $table->string('tipo_documento',255);
            $table->string('documento',255);
            $table->string('telefono',255);
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
        Schema::dropIfExists('_client');
    }
}
