<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('itemsequenceno');
            $table->string('itemtype');
            $table->string('itemreference');
            $table->double('volume');
            $table->double('weight');
            $table->double('length');
            $table->double('height');
            $table->double('width');
            $table->integer('quantity');
            $table->string('itemaction');
            $table->string('receiver_address');
            $table->string('receiver_postcode');
            $table->string('receiver_phone');
            $table->string('receiver_country');
            $table->string('receiver_town');
            $table->string('receiver_contactname');
            $table->string('receiver_email');
            $table->string('receiver_province');
            $table->double('price');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
