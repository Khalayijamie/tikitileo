<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->date('date')->default('2024-01-12');
            $table->time('time')->default('00:00:00');
            $table->string('image')->default('default.jpg');
            $table->string('price')->default('0');
            $table->id()->unsigned();
            $table->timestamps()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
