<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const TYPE_USER = 'User';

    const TYPE_PRACTITIONER = 'Practitioner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'username',
        'location',
        'account_type',
        'password',
        'avatar',
        'google_id',
        'currency_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
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
     * isPractitioner
     */
    public function isPractitioner()
    {
        return $this->account_type === self::TYPE_PRACTITIONER;
    }

    /**
     * isPractitioner
     */
    public function expireDateDiff()
    {
        $month = 1;
        if($this->therapist?->membership_expire){
            $membership_expire = Carbon::createFromFormat('Y-m-d', $this->therapist?->membership_expire);
            $month = $membership_expire->diffInMonths(now());
        }

        return $month <= 1 ? true : false;
    }

    /**
     * get practitioner user
     *
     * @param  mixed  $query
     */
    public function scopePractitioner($query)
    {
        return $query->where('account_type', self::TYPE_PRACTITIONER);
    }

    /**
     * Get the therapist for the user
     */
    public function therapist()
    {
        return $this->hasOne(Therapist::class, 'practitioner_id');
    }

    /**
     * Get the orders for the user
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the order associated with the User
     */
    public function order()
    {
        return $this->hasOne(Order::class)->latest('id');
    }

    /**
     * Get the payments for the user
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the payments for the user
     */
    public function payment()
    {
        return $this->hasOne(Payment::class)->where('status', 'success')->latest();
    }

    /**
     * Get the payments for the user
     */
    public function paymentCards()
    {
        return $this->hasMany(PaymentCard::class);
    }

    /**
     * Get the enrolls for the user
     */
    public function enrolls()
    {
        return $this->hasMany(Enroll::class);
    }

    /**
     * Get the bookings for the user
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get all of the videoPayments for the User
     */
    public function videoPayments()
    {
        return $this->hasMany(VideoPayment::class);
    }

    /**
     * Get all of the renews for the User
     */
    public function renews()
    {
        return $this->hasMany(Renew::class);
    }

    /**
     * Get all of the visitors for the User
     */
    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    /**
     * Get the currency that owns the User
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
