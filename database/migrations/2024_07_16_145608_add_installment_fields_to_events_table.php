<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
     public function up()
     {
         Schema::table('events', function (Blueprint $table) {
             $table->boolean('installments_enabled')->default(false);
             $table->integer('installment_count')->nullable();
             $table->integer('installment_interval')->nullable();
         });
     }
     
     public function down()
     {
         Schema::table('events', function (Blueprint $table) {
             $table->dropColumn(['installments_enabled', 'installment_count', 'installment_interval']);
         });
     }
     
};
