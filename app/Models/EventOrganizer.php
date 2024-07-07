<?php

// app/Models/EventOrganizer.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class EventOrganizer extends Authenticatable
{
    use Notifiable;

    protected $table = 'event_organizers'; // Specify the table name

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($organizer) {
            $organizer->password = Hash::make($organizer->password);
        });
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
