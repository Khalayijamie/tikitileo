<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'category', 'location', 'date', 'time', 'image', 'price', 
        'available_tickets', 'organizer_id', 'installments_enabled', 'installment_count', 
        'installment_dates'
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function paymentPlans()
    {
        return $this->hasMany(PaymentPlan::class);
    }
}
