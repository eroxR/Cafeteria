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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('reference', 60);
            $table->decimal('price', $precision = 12, $scale = 2);
            $table->string('weight', 60);
            $table->unsignedBigInteger('category');
            $table->bigInteger('stock');
            $table->timestamp('creation_date');
            $table->unsignedBigInteger('user')->nullable();
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('user')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
