<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no');
            $table->bigInteger('product_id')->unsigned();
            $table->string('gross_amount');
            $table->string('service_charge');
            $table->string('vat_charge');
            $table->string('net_amount');
            $table->string('discount')->nullable();
            $table->tinyInteger('post_status')->default('0')->comment('1=ongoing, 0=finished');
            $table->timestamps();


            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
