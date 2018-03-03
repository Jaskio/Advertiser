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
use App\Repositories\SubCategory\SubCategory;

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
     * @return \Illuminate\Http\Response
     */
    public function editAccount()
    {
        $user = $this->model->get(Auth::user()->id);
        $categories = new Category();
        $subcategories = new SubCategory();

        return view('account.edit')->with('user', $user)
                                   ->with('categories', $categories->getModel()->get())
                                   ->with('subcategories', $subcategories->getModel()->get());
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

        $input = $request->only(['full_name',
                                'email',
                                'password',
                                'avatar_path']);
        
        if ($request->hasFile('avatar_path')) {
            $image = $request->file('avatar_path');
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
    
            $destinationPath = '/uploads/avatar/';
            $image->move(public_path($destinationPath), $fileName);

            $input['avatar_path'] = $destinationPath . $fileName;
        }

        if ($request->password == '' || $request->password == null) {
            unset($input['password']);
        } else {
            $input['password'] = bcrypt($input['password']);
        }

        $input['id'] = $id;
        $this->model->update($input);

        return redirect()->back()->with('success_message', trans('forms.success_message'));
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