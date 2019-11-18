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
            $table->date('collection_date')->nullable();
            $table->double('volume');
            $table->double('weight');
            $table->double('length');
            $table->double('height');
            $table->double('width');
            $table->integer('quantity')->nullable();
            $table->string('itemaction')->nullable();

            $table->string('sender_full_name')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_address_1')->nullable();
            $table->string('sender_address_2')->nullable();
            $table->string('sender_city')->nullable();
            $table->string('sender_province')->nullable();
            $table->string('sender_postcode')->nullable();
            $table->string('sender_country')->nullable();

            $table->string('departure_phone')->nullable();
            $table->string('departure_address_1')->nullable();
            $table->string('departure_address_2')->nullable();
            $table->string('departure_city')->nullable();
            $table->string('departure_province')->nullable();
            $table->string('departure_postcode')->nullable();
            $table->string('departure_country')->nullable();

            $table->string('receiver_full_name')->nullable();
            $table->string('receiver_phone')->nullable();
            $table->string('receiver_email')->nullable();
            $table->string('receiver_address_1')->nullable();
            $table->string('receiver_address_2')->nullable();
            $table->string('receiver_city')->nullable();
            $table->string('receiver_province')->nullable();
            $table->string('receiver_postcode')->nullable();
            $table->string('receiver_country')->nullable();

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
