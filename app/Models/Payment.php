<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    const METHOD = ['Stripe', 'Paypal', 'Worldpay', 'Amazon Pay', 'Shopify', 'Opayo', 'Cardstream', '2Checkout', 'Adyen'];

    const FOR_ORDER = 'Order';

    const FOR_ENROLL = 'Enroll';

    const FOR_BOOKING = 'Booking';

    protected $fillable = [
        'relation_id',
        'user_id',
        'subtotal',
        'discount',
        'total',
        'for',
        'method',
        'status',
        'btc_wallet',
        'trx',
    ];

    /**
     * Get the user that owns the payment
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order that owns the payment
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'relation_id');
    }

    /**
     * Get the enroll that owns the payment
     */
    public function enroll()
    {
        return $this->belongsTo(Enroll::class, 'relation_id');
    }

    /**
     * Get the booking that owns the payment
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'relation_id');
    }
}
