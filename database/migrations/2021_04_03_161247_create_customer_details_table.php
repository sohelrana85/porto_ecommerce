<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('full_name', 40);
            $table->string('division', 30);
            $table->string('district', 30);
            $table->string('thana', 30);
            $table->string('address', 255);
            $table->string('phone', 11);
            $table->tinyInteger('default_address')->default('0');
            $table->tinyInteger('shipping_address')->default('0');
            $table->tinyInteger('billing_address')->default('0');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_details');
    }
}
