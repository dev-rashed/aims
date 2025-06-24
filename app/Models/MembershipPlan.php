<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'title', 'monthly_price', 'yearly_price', 'description', 'icon', 'color'];

    /**
     * Get the orders for the membership plan.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the therapists for the membership plan.
     */
    public function therapists()
    {
        return $this->hasMany(Therapist::class, 'membership_id');
    }

    /**
     * Get all of the renews for the membership plan
     */
    public function renews()
    {
        return $this->hasMany(Renew::class, 'membership_id');
    }
}
