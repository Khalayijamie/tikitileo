<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Installments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Installment ID')->nullable();
            $table->string('Ticket ID')->nullable();
            $table->string('Total Amt')->nullable();
            $table->string('Installment type')->nullable();
            $table->string('Installment Amount')->nullable();
            $table->string('Due date')->nullable();
            $table->string('Paid amount')->nullable();
            $table->string('Payment status')->nullable();
            $table->string('Remaining Amount')->nullable();
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
        Schema::dropIfExists('Installments');
    }
}
