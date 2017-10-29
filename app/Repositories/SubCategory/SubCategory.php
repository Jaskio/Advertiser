<?php

namespace App\Repositories\SubCategory;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Repositories\Advertisement\Advertisement;
use App\Repositories\Category\Category;

class SubCategory extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * Defines relation between Advertisement and SubCategory model
     *
     * @return model    App\Repositories\Advertisement\Advertisement
     */
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class, 'sub_category_id');
    }

    /**
     * Defines relation between SubCategory and Category model
     *
     * @return model   App\Repositories\Category\Category
    */
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
