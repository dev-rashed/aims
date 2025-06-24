<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    use HasFactory;

    protected $fillable = [
        'practitioner_id',
        'email',
        'phone',
        'status',
        'registered',
        'hide_profile',
        'live_profile',
        'degree',
        'short_description',
        'website',
        'referred_by',
        'key_details',
        'about',
        'experience',
        'fees',
        'availability',
        'further_information',
        'online_platforms',
        'tags',
        'health_insurance_providers',
        'membership_id',
        'membership_type',
        'membership_start_date',
        'member_id',
        'membership_expire',
        'latitude_address',
        'longitude_address',
        'documents',
        'video',
        'auto_renew',
        'is_seen',
    ];

    protected $casts = [
        // 'hide_profile' => 'boolean',
        'live_profile' => 'boolean',
        'auto_renew' => 'boolean',
        'online_platforms' => 'object',
        'is_seen' => 'boolean',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted()
    {
        static::created(function (Model $model) {
            $model->update([
                'email' => $model->user?->email,
                'phone' => $model->user?->phone
            ]);
        });
    }

    /**
     * get status therapist
     */
    public function scopeStatus(Builder $query)
    {
        return $query->where('membership_expire', '>=', date('Y-m-d'))->where('hide_profile', false)->whereHas('user.payment', fn(Builder $q) => $q->whereDate('created_at', '>=', date('Y-m-d')));
    }

    /**
     * get approved therapist
     */
    public function scopeApproved(Builder $query, $value = 'approved')
    {
        return $query->where('status', $value);
    }

    /**
     * Get the user that owns the therapist
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'practitioner_id');
    }

    /**
     * The professions that belong to the therapist.
     */
    public function professions()
    {
        return $this->belongsToMany(Profession::class);
    }

    /**
     * The languages that belong to the therapist.
     */
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    /**
     * The sessions that belong to the therapist.
     */
    public function sessions()
    {
        return $this->belongsToMany(Session::class);
    }

    /**
     * The accessibilities that belong to the therapist.
     */
    public function accessibilities()
    {
        return $this->belongsToMany(Accessibility::class);
    }

    /**
     * The concessions that belong to the therapist.
     */
    public function concessions()
    {
        return $this->belongsToMany(Concession::class);
    }

    /**
     * The formats that belong to the therapist.
     */
    public function formats()
    {
        return $this->belongsToMany(Format::class);
    }

    /**
     * Get the membership plan for the therapist
     */
    public function membershipPlan()
    {
        return $this->belongsTo(MembershipPlan::class, 'membership_id');
    }

    /**
     * Get the distances for the role.
     */
    public function distances()
    {
        return $this->hasMany(TherapistDistance::class);
    }

    /**
     * Get all of the certificate for the Therapist
     */
    public function certificate()
    {
        return $this->hasOne(Certificate::class);
    }
}
