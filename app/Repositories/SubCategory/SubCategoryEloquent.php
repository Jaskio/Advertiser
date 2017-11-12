<?php

namespace App\Repositories\SubCategory;

use Config;

class SubCategoryEloquent
{
    /**
     * SubCategory instance, Laravel's model
     * @var App\Repositories\Category\Category
    */
    private $model;
    
    /**
     * Assign required properties and instantiate required classes
     *
     * @param Category   $model    App\Repositories\SubCategory\SubCategory   
    */
    public function __construct(SubCategory $model) {
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
     * Get all sub_categories or specified one with advertisements
     *
     * @param array $ids  ids of specified sub_category
     * @return object
    */
    public function get($ids) {
        if ($ids) {
            // $sub_category = $this->model->with('advertisements')->find($ids);

            // return $sub_category;
        } else {
            // return $this->model->all();
        }
    }
}
