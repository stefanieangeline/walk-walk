<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        "name",
        "email",
        "password",
        "DOBUser",
        "NationalityUser",
        "NoTelpUser",
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];
}