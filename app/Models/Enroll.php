<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'user_id',
        'invoice',
        'address',
    ];

    protected $casts = [
        'is_seen' => 'boolean',
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the payment for the enroll
     */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'relation_id')->where('for', Payment::FOR_ENROLL);
    }

    /**
     * Get the course for the order
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
