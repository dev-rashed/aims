<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'invoice',
        'address',
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the payment for the booking
     */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'relation_id')->where('for', Payment::FOR_BOOKING);
    }

    /**
     * Get the event for the order
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
