<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientStockRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_stock_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->foreign('client_id')->on('clients')->references('sch_id')->onUpdate('cascade')->onDelete('set null');
            $table->string('product_name');
            $table->string('product_description');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->on('categories')->references('id')->onUpdate('cascade')->onDelete('set null');
            $table->bigInteger('SKU_ID');
            $table->bigInteger('SKU_BARCODE');
            $table->bigInteger('product_reorder_level');
            $table->bigInteger('product_retail_price');
            $table->string('product_picture');
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
        Schema::dropIfExists('client_stock_requests');
    }
}
