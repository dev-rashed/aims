<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TherapistDistance extends Model
{
    use HasFactory;

    protected $fillable = ['therapist_id', 'distance', 'location'];

    /**
     * Get the therapist for the therapist distance.
     */
    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }
}
