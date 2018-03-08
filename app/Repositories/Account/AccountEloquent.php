<?php

namespace App\Repositories\Account;

use Auth;
use App\User;
use App\Table;

class AccountEloquent implements IAccount
{
    /**
     * User instance, Laravel's model
     * @var App\User
    */
    private $model;
    
    /**
     * Assign required properties and instantiate required classes
     *
     * @param User   $model         App\User    
    */
    public function __construct(User $model) {
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
     * Get users for index and show
     *
     * @param int $id  id of specified user
     * @return object
    */
    public function get($id = NULL) {
        return $this->model->with('advertisements')->findOrFail($id);
    }

    /**
     * Update row in user table
     *
     * @param array $data Data to update users settings
     * @return object
    */
    public function update($data) {
        return $this->model->where('id', $data['id'])->update($data);
    }
}
