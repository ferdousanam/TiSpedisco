<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('distance_from');
            $table->double('distance_to');
            $table->double('weight_from');
            $table->double('weight_to');
            $table->double('length_from');
            $table->double('length_to');
            $table->double('width_from');
            $table->double('width_to');
            $table->double('height_from');
            $table->double('height_to');
            $table->double('volume');
            $table->double('price');
            $table->string('estimate_time');
            $table->double('vat');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->unsignedBigInteger('carrier_id');
            $table->foreign('carrier_id')->references('id')->on('carriers')->onDelete('cascade');
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
        Schema::dropIfExists('rates');
    }
}
