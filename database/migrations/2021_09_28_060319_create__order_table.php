<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_order', function (Blueprint $table) {
            $table->id();
            $table->string('orderId',150);
            $table->string('nombre',150);
            $table->string('apellido',150);
            $table->bigInteger('cantidad');
            $table->bigInteger('monto_total');
            $table->bigInteger('importe_total');
            $table->unsignedBigInteger('clientId');
            $table->boolean('procesada')->default(0);
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
        Schema::dropIfExists('_order');
    }
}
