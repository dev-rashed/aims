<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The therapists that belong to the language.
     */
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class);
    }

    /**
     * Get the courses for the language.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
