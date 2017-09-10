<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Advertisement\IAdvertisement;
use App\Repositories\Account\AccountEloquent;
use App\Repositories\Category\{
    CategoryEloquent,
    Category
};
use App\User;
use Auth;
use Config;

class AdvertisementController extends Controller
{
    /**
     * Advertisement model to work with
     * @var App\Repositories\Advertisement\AdvertisementEloquent
    */
    private $model;

    /**
     * Category model to work with
     * @var App\Repositories\Category\CategoryEloquent
    */
    private $category_model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IAdvertisement $model, CategoryEloquent $category_model)
    {
        $this->model = $model;
        $this->category_model = $category_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = $this->model->get(NULL);

        return view('advertisement.index')->with('ads', $ads)
                                          ->with('categories', $this->category_model->get(NULL));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertisement.create')->with('categories', $this->category_model->get(NULL));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, $this->model->getModel()::userRules());

        $id = Auth::user()->id;

        $data = $request->only(['title',
                                'description',
                                'price',
                                'img_path']);
        $data['user_id'] = $id;

        $this->model->create($data);

        // $user = new AccountEloquent(new User);
        // dd(json_encode($user->get($id)));
        // return route('account.edit')->with('user', $user->get($id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = $this->model->get($id);

        return view('advertisement.show')->with('ad', $ad)
                                         ->with('categories', $this->category_model->get(NULL));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = $this->model->get($id);
        
        return view('advertisement.edit')->with('ad', $ad)
                                         ->with('categories', $this->category_model->get(NULL));
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
        // $this->validate($request, $this->model->getModel()::userRules());

        $data = $request->only(['title',
                                'description',
                                'price']);
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
        $this->model->delete($id);
        return redirect()->back();
    }

    /**
     * Display the specified category ads.
     *
     * @param [int] $category_id
     * @return \Illuminate\Http\Response
     */
    public function showCategoryItems($category_id = NULL) {
        $ads = $this->category_model->get($category_id);
        
        return view('advertisement.index')->with('ads', $ads)
                                          ->with('categories', $this->category_model->get(NULL));
    }
}
