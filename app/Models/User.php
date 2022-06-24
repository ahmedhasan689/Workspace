<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone_number',
        'avatar',
        'city_id',
    ];

    // Relation With Cith
    public function city()
    {
        return $this->belongsTo(City::class);
    }

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

    // Accessors For avatar
    public function getImageAttribute()
    {
        if (!$this->avatar) {
            return asset('front/img/default_avatar.jpg');
        }

        if (stripos($this->avatar, 'http') === 0) {
            return $this->avatar;
        }

        return asset('user_avatar' . '/' . $this->avatar);
    }
}
