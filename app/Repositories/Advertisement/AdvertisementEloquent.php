<?php

namespace App\Repositories\Advertisement;

use Auth;
use App\Repositories\EloquentCrud;

class AdvertisementEloquent extends EloquentCrud implements IAdvertisement
{
    /**
     * Advertisement instance, Laravel's model
     * @var App\Repositories\Advertisement\Advertisement
    */
    private $model;
    
    /**
     * Assign required properties and instantiate required classes
     *
     * @param Advertisement   $model    App\Repositories\Advertisement\Advertisement   
    */
    public function __construct(Advertisement $model) {
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
     * Get advertisements for index and show
     *
     * @param int $id  id of specified advertisement
     * @return object
    */
    public function get($id = NULL) {
        if ($id) {
            return $this->model->find($id);
        } else {
            return $this->model->all();
        }
    }

    // public function delete($id, $hardDelete = false) 
    // {   
    //     return $this->getModel()->where('id', $id)->delete();
    // }
}
