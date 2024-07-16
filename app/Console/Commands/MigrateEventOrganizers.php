<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateEventOrganizers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:event-organizers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate event organizers data to users table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $eventOrganizers = DB::table('event_organizers')->get();

        foreach ($eventOrganizers as $organizer) {
            // Insert organizer data into users table
            DB::table('users')->insert([
                'name' => $organizer->name,
                'email' => $organizer->email,
                'password' => $organizer->password,
                'role' => 'event_organizer',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Get the ID of the newly inserted user
            $user = DB::table('users')->where('email', $organizer->email)->first();

            // Update the events table with the new organizer_id
            DB::table('events')
                ->where('event_organizer_id', $organizer->id)
                ->update(['organizer_id' => $user->id]);
        }

        $this->info('Event organizers data migrated successfully!');
        return 0;
    }
}
