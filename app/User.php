<?php
namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'social_security_number',
        'phone_number',
        'remember_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_types() {
        return $this->belongsTo('App\UserType');
    }

    public function scopeActives() {
        return $query->where('activated', true);
    }
}

