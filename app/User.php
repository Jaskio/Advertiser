<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Repositories\Advertisement\Advertisement;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
        'deleted_at',
        'updated_at',
        'created_at',
        'token'
    ];

    /**
     * Defines relation between Advertisement and User  model
     *
     * @return model    App\Repositories\Advertisement\Advertisement
     */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
}
