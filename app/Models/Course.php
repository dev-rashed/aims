<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const TYPE_ONLINE = 'Online';

    const TYPE_ADVANCED = 'Advanced';

    protected $fillable = [
        'counsellor_id',
        'language_id',
        'title',
        'slug',
        'short_description',
        'image',
        'description',
        'duration',
        'total_class',
        'price',
        'tags',
        'type',
    ];

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get the counsellor that owns the course.
     */
    public function counsellor()
    {
        return $this->belongsTo(Counsellor::class);
    }

    /**
     * Get the language that owns the course.
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * Get the enroll for the course
     */
    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }

    /**
     * Get all of the modules for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(CourseModule::class);
    }
}
