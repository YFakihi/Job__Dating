<?php

// User.php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function skills()
    {
        return $this->belongsToMany(Skills::class, 'skill_user'); // Adjust pivot table name here
    }

    public function adverts()
    {
        return $this->belongsToMany(Advert::class, 'user_advert','user_id','advert_id'); // Adjust pivot table name here
    }
}


