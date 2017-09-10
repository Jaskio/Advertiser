<?php

namespace App\Repositories\Category;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Repositories\Advertisement\Advertisement;

class Category extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'deleted_at',
        'created_at'
    ];

    /**
     * Defines relation between Advertisement and Category model
     *
     * @return model    App\Repositories\Advertisement\Advertisement
     */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'category_id');
    }
}
