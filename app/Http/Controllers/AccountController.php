<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Lang;
use App;
use App\Table;
use App\Repositories\Account\IAccount;
use App\User;
use App\Repositories\Advertisement\Advertisement;
use App\Repositories\Category\Category;

class AccountController extends Controller
{
    /**
     * User model to work with
     * @var App\User
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
        dd('create account');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->only(['full_name']));
        dd($this->validate($request, [
            'full_name' => 'required|max:255'
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->model->get($id);
        $categories = new Category();

        return view('account.edit')->with('user', $user)
                                   ->with('categories', $categories->getModel()->get(NULL));
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
        $this->validate($request, $this->model->getModel()::userRules());

        $data = $request->only(['full_name',
                                'email']);
        $data['id'] = $id;

        $this->model->update($data);

        return redirect()->back();
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