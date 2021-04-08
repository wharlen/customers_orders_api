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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('orderNumber', 11)->primary();
            $table->date('orderDate');
            $table->date('requiredDate');
            $table->string('shippedDate')->nullable();
            $table->string('status', 15);
            $table->text('comments')->nullable();
            $table->string('customerNumber', 11);
            $table->foreign('customerNumber')->references('customerNumber')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
