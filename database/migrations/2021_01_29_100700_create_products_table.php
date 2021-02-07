<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('model')->nullable();
            $table->decimal('buying_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->decimal('special_price', 8, 2)->nullable();
            $table->date('special_price_from')->nullable();
            $table->date('special_price_to')->nullable();
            $table->integer('quantity');
            $table->string('sku_code');
            $table->string('color')->default('[]');
            $table->string('size')->default('[]');
            $table->longText('thumbnail');
            $table->string('images')->nullable();
            $table->tinyInteger('warranty')->default('0')->comment('1 for yes 0 for no');
            $table->string('warranty_duration')->nullable();
            $table->longText('warranty_condition')->nullable();
            $table->longText('description');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->unsignedBigInteger('create_by');
            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
            $table->foreign('brand_id')->on('brands')->references('id')->onDelete('cascade');
            $table->foreign('create_by')->on('users')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
