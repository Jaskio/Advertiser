<?php

namespace App\Repositories\Advertisement;

use Auth;
use Config;

class AdvertisementEloquent
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
            return $this->model->with('user')->findOrFail($id);
        } else {
            return $this->model->orderBy('created_at', 'desc')->paginate(Config::get('settings.pagination.limit'));
        }
    }

    /**
     * Get all ads excluding pagination
     *
     * @return array
     */
    public function getAll() {
        return $this->model->get();
    }

    /**
     * Update row in advertisement table
     *
     * @param array $data Data to update users settings
     * @return object
    */
    public function update($data) {
        return $this->model->where('id', $data['id'])->update($data);
    }

    /**
     * Creating new resource in advertisement table
     *
     * @param [Object] $data
     * @return void
     */
    public function create($data) {
        $this->model->create($data);
    }

    /**
     * Delete row in advertisement table
     *
     * @param [Integer] $id
     * @param boolean $hardDelete
     * @return void
     */
    public function delete($id, $hardDelete = false) 
    {
        $this->model->where('id', $id)->delete();
    }
}
