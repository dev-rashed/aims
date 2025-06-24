<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'counsellor_id',
        'title',
        'slug',
        'price',
        'location',
        'date',
        'time',
        'image',
        'short_description',
        'description',
        'tags',
    ];

    /**
     * Get the counsellor that owns the event.
     */
    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class);
    }

    /**
     * Get the booking for the course
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
