<?php

namespace App\Repositories\Advertisement;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Repositories\Category\Category;
use App\Repositories\SubCategory\SubCategory;
use App\User;

class Advertisement extends Model
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'img_path',
        'user_id',
        'category_id',
        'sub_category_id'
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
     * Get Laravel rules for Advertisement model
     *
     * @param array $merge
     * @return array of rules
    */
    public static function advertisementRules() {
        return [
                'title'            => 'required|string',
                'description'      => 'max:200',
                'price'            => 'required|integer',
                'img_path'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sub_category_id'  => 'required'
            ];
    }

    /**
     * Defines relation between Advertisement and User model
     *
     * @return model   App\Repositories\User\User
    */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Defines relation between Advertisement and Category model
     *
     * @return model   App\Repositories\Category\Category
    */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Defines relation between Advertisement and SubCategory model
     *
     * @return model   App\Repositories\SubCategory\SubCategory
    */
    public function sub_category() {
        return $this->belongsTo(SubCategory::class);
    }
}
