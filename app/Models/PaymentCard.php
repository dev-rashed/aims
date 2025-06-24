<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'number'];

    /**
     * Get the user that owns the payment card.
     */
    public function user()
    {
        return $this->belongsTo(User::class)->where('account_type', User::TYPE_PRACTITIONER);
    }
}
