<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->string('orderNumber', 11)->primary();
            $table->string('productCode', 15);
            $table->string('quantityOrdered', 11);
            $table->double('priceEach', 10, 2);
            $table->smallInteger('orderLineNumber', 6);
            //$table->foreign('orderNumber')->references('orderNumber')->on('orders');
            //$table->foreign('productCode')->references('productCode')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
