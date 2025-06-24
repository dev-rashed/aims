<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessibility extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The therapists that belong to the accessibility.
     */
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class);
    }
}
