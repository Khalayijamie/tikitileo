<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('event_organizer_id'); // Add the event organizer ID
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('date_and_time')->nullable(); // Use appropriate data type for date and time
            $table->string('location')->nullable();
            $table->decimal('ticket_price', 8, 2)->nullable(); // Use decimal for price
            $table->integer('available_tickets')->nullable(); // Use integer for tickets
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('event_organizer_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
