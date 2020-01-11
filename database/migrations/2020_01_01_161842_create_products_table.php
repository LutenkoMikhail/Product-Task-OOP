<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('author_id')->unsigned()->nullable();
            $table->string('title', 50)->unique()->nullable();
            $table->string('description', 100);
            $table->string('short_description', 50);
            $table->string('sku', 50)->unique()->nullable();
            $table->float('price')->unsigned();
            $table->text('thumbnail')->nullable();
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
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
}
