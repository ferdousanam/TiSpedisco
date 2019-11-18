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
            $table->string('order_code')->nullable();
            $table->integer('itemsequenceno')->nullable();
            $table->string('itemtype')->nullable();
            $table->string('item_reference')->nullable();
            $table->date('collection_date');
            $table->double('volume');
            $table->double('weight');
            $table->double('length');
            $table->double('height');
            $table->double('width');
            $table->integer('quantity')->nullable();
            $table->string('itemaction')->nullable();
            $table->string('receiver_address')->nullable();
            $table->string('receiver_postcode')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->string('receiver_country')->nullable();
            $table->string('receiver_town')->nullable();
            $table->string('receiver_contactname')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('receiver_province')->nullable();
            $table->double('price');
            $table->double('additional_cost')->nullable();
            $table->double('total_cost');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->text('possible_notes')->nullable();
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
