<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = ['therapist_id', 'image', 'logo', 'status'];

    /**
     * Get the therapist that owns the certificate
     */
    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }
}
