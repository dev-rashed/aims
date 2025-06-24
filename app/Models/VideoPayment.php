<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoPayment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amount', 'expire_date'];

    /**
     * Get the user that owns the VideoPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class)->where('account_type', User::TYPE_PRACTITIONER);
    }
}
