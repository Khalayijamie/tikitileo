<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedInteger('event_id')->after('user_id'); // Add the event_id column
            $table->integer('total_installments')->default(1)->after('status'); // Add for installment payments
            $table->integer('paid_installments')->default(0)->after('total_installments'); // Add for installment payments

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade'); // Foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
            $table->dropColumn('total_installments');
            $table->dropColumn('paid_installments');
        });
    }
};
