<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;

    public $timestamps = false;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pin',
        'name',
        'user_id',
        'user_group_id',
        'mobile_number',
        'email_address',
        'password_log',
        'location',
        'remarks',
        'admin_status',
        'password_change_status',
        'password_change_datetime',
        'verify_status',
        'lock_status',
        'block_status',
        'user_address',
        'password_expiry_date',
        'data_status',
        'entry_by',
        'entry_datetime',
        'verify_by',
        'verify_datetime',
        'last_modified_by',
        'last_modified_datetime',
        'delete_by',
        'delete_datetime',
        'block_by',
        'block_datetime',
        'unblock_by',
        'unblock_datetime',
        'SESSION_idle_time',
        'global_session_time',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
