<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Ticket Id')->nullable();
            $table->string('Event Name')->nullable();
            $table->string('User ID')->nullable();
            $table->string('Purchase Date')->nullable();
            $table->string('Payment Status')->nullable();
            $table->string('Payment Method')->nullable();
            $table->string('Installment Plan')->nullable();
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
        Schema::dropIfExists('ticket');
    }
}
