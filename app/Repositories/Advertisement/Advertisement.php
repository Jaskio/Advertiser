<?php

namespace App\Repositories\Advertisement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Advertisement extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'img_path'
    ];

    /**
     * Hide these columns in JSON response. These columns will not be shown in get requests (selects from database)
     *
     * @var array
     */
    protected $hidden = [
        'updated_at',
        'deleted_at',
        'created_at'
    ];

    /**
     * Defines relation between Advertisement and User model
     *
     * @return model   App\Repositories\User\User
    */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
