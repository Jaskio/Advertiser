<?php

namespace App\Repositories\Category;

use Auth;
use Config;
use App\Repositories\EloquentCrud;

class CategoryEloquent extends EloquentCrud
{
    /**
     * Category instance, Laravel's model
     * @var App\Repositories\Category\Category
    */
    private $model;
    
    /**
     * Assign required properties and instantiate required classes
     *
     * @param Category   $model    App\Repositories\Category\Category   
    */
    public function __construct(Category $model) {
        $this->model = $model;        
    }

    /**
     * Get Laravel's model
     *
     * @return void
    */
    public function getModel() {
        return $this->model;
    }

    /**
     * Get all categories or specified one with advertisements
     *
     * @param int $id  id of specified category
     * @return object
    */
    public function get($id) {
        if ($id) {
            $category = $this->model->with('advertisements')->findOrFail($id);
            
            return $category->advertisements()->paginate(Config::get('settings.pagination.limit'));
        } else {
            return $this->model->all();
        }
    }
}
