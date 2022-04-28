<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Owner extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'id',
        'full_name',
        'company_name',
        'email',
        'email_verified_at',
        'password',
        'phone_number',
        'avatar',
        'city_id',
    ];

    // Relation With Cith
    public function city() {
        return $this->belongsTo(City::class);
    }

    // Relation With Workspace
    public function workspaces(){
        return $this->hasMany(Workspace::class);
    }

}
