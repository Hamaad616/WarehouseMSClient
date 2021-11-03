<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class clients extends Authenticatable
{
    use Notifiable;

    protected $guard = 'client';

    protected $fillable = [
        'name', 'email', 'password', 'storage_plan', 'fulfil_plan', 'fl_rate', 'payment_plan'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


}
