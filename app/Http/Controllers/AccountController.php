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
        // return view('home')->with('users', $u);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->model->get($id);
        
        return view('account.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        var_dump($id); die;
        $this->model->delete($id);
        return redirect('/');
    }
}