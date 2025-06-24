<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    const DISCOUNT_TYPE_FIXED = 'fixed';

    const DISCOUNT_TYPE_PERCENTAGE = 'percentage';

    protected $fillable = ['code', 'discount_type', 'discount', 'expire_date', 'status'];
}
