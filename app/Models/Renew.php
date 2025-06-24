<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renew extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_seen' => 'boolean',
    ];

    /**
     * Get the user that owns the Renew
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the membership that owns the Renew
     */
    public function membership()
    {
        return $this->belongsTo(MembershipPlan::class, 'membership_id');
    }
}
