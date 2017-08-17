<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Lang;
use App;
use DB;

use App\Table;
use App\Repositories\Account\IAccount;
use App\User;
use App\Repositories\Advertisement\Advertisement;

class AccountController extends Controller
{
    /**
     * User model to work with
     * @var App\Repositories\User\EloquentUser
    */
    private $model;

    /**
     * Instantiate required classes for the controller
     *   
     * @param EloquentUser $model   App\Repositories\User\User
    */
    public function __construct(IAccount $model) {
        $this->model = $model;
        // var_dump($this->model->find(1));die;
    }

    /**
     * Display a listing of users.
     *
     * @return \Illuminate\Http\Response
    */
    public function index() {
        // $users = $this->getUsers();
        // $u = DB::table('users')->where('name', 'like', 'Ja%')->get();
        // $test = DB::table('users')->leftJoin('test', 'users.id', '=', 'test.id')->get();
        var_dump(Advertisement::find(2)->user);
        // return view('home')->with('users', $u);
    }

    /**
     * Get all user accounts
     *
     * Route: account/get
     *
     * @return json Array of selected user accounts
     */
    public function getUsers() {
        if (Auth::check()) {
            return response()->json($this->model->get(1), 200);
        } else {
            return response()->json('You must be logged in.', 400);
        }
    }
}