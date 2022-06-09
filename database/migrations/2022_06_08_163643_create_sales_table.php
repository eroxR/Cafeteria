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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', $precision = 12, $scale = 2);
            $table->decimal('amount_paid', $precision = 12, $scale = 2);
            $table->decimal('change', $precision = 12, $scale = 2);
            $table->unsignedBigInteger('product');
            $table->timestamps();

            $table->foreign('product')->references('id')->on('products')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
