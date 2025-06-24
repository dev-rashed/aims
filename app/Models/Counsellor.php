<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counsellor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'designation',
        'email',
        'phone',
        'image',
    ];

    protected $appends = [
        'full_name',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the courses for the counsellor.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get the events for the counsellor.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Get the articles for the counsellor.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
