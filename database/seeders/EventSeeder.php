<?php

namespace Database\Seeders;
use App\Models\Event;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'name' => 'Marketing Summit',
            'description' => 'Join us for the annual Marketing Summit',
            'date' => '2024-01-12',
            'location' => 'New York, USA',
        ]);

    }
}
