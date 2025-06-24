<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCodeTherapist extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'therapist_id', 'distance'];

    /**
     * Get the staff for the role.
     */
    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }
}
