<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role',
    ];

    public function registration()
    {
        return $this->hasOne(Registration::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
