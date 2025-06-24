<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'membership_plan_id',
        'user_id',
        'membership_type',
        'invoice',
        'subtotal',
        'discount',
        'total',
    ];

    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class)->where('account_type', User::TYPE_PRACTITIONER);
    }

    /**
     * Get the payment for the order
     */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'relation_id')->where('for', Payment::FOR_ORDER);
    }

    /**
     * Get the membership plan for the order
     */
    public function membershipPlan()
    {
        return $this->belongsTo(MembershipPlan::class);
    }
}
