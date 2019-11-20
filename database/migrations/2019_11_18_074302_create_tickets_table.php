<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('message');
            $table->string('file')->nullable();
            $table->enum('status', ['new', 'unread', 'read', 'replied'])->default('new');
            $table->enum('state', ['open', 'closed'])->default('open');
            $table->boolean('is_paralyzes')->default(false);
            $table->timestamps();
        });
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('message');
            $table->string('file')->nullable();
            $table->enum('status', ['new', 'unread', 'read', 'replied'])->default('new');
            $table->timestamps();
        });
        Schema::create('inner_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('message');
            $table->string('file')->nullable();
            $table->enum('status', ['new', 'unread', 'read', 'replied'])->default('new');
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
        Schema::dropIfExists('inner_replies');
        Schema::dropIfExists('ticket_replies');
        Schema::dropIfExists('tickets');
    }
}
