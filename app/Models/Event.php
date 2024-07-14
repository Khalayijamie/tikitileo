<?php

// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_organizer_id',
        'name',
        'description',
        'location',
        'date',
        'time',
        'image',
        'price',
        'available_tickets',
    ];

    public function organizer()
    {
        return $this->belongsTo(EventOrganizer::class, 'event_organizer_id');
    }

    public function paymentPlans()
    {
        return $this->hasMany(PaymentPlan::class);
    }
}
