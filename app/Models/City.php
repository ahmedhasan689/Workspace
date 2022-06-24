<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
    ];

    // Relation With Owner
    public function owners() {
        return $this->hasMany(Owner::class);
    }

    // Relation With User [Customer]
    public function customers() {
        return $this->hasMany(USer::class);
    }

    // Relation With Workspace
    public function workspaces(){
        return $this->hasMany(Workspace::class);
    }
}
