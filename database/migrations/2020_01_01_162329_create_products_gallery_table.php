<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_gallery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('image_path')->nullable();
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')
                ->references('id')
                ->on('products');
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
        Schema::dropIfExists('products_gallery');
    }
}
