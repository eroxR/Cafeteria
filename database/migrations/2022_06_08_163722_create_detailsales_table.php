<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailsales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amount_product_sold');
            $table->unsignedBigInteger('product');
            $table->unsignedBigInteger('sale');
            $table->timestamps();

            $table->foreign('product')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('sale')->references('id')->on('sales')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailsales');
    }
};
