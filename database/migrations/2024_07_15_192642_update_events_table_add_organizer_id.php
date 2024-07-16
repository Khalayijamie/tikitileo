<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Add new organizer_id column
            $table->unsignedBigInteger('organizer_id')->nullable();

            // If the old organizer_id column exists, remove it
            if (Schema::hasColumn('events', 'event_organizer_id')) {
                $table->dropForeign(['event_organizer_id']);
                $table->dropColumn('event_organizer_id');
            }

            // Add the new foreign key constraint
            $table->foreign('organizer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Drop the new foreign key constraint
            $table->dropForeign(['organizer_id']);
            $table->dropColumn('organizer_id');

            // Re-add the old event_organizer_id column if necessary
            $table->unsignedBigInteger('event_organizer_id')->nullable();
            $table->foreign('event_organizer_id')->references('id')->on('event_organizers')->onDelete('cascade');
        });
    }
};
