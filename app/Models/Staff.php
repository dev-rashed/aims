<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'phone',
        'address',
        'image',
        'status',
        'deletable',
        'password',
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
     * access permission
     *
     * @return void
     */
    public function hasPermission($permission): bool
    {
        return in_array($permission, json_decode($this->role->permissions)) ? true : false;
    }

    /**
     * Get the role that owns the staff.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
