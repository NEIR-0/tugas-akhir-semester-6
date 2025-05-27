<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token', // boleh tetap ada kalau kamu gunakan fitur remember me
    ];

    protected $casts = [
        // 'email_verified_at' => 'datetime', // hapus kalau tidak pakai
        'password' => 'hashed',
    ];
}
