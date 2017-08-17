<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Advertisement\IAdvertisement;
use App\User;

class AdvertisementController extends Controller
{
    /**
     * User model to work with
     * @var App\Repositories\Advertisement\EloquentAdvertisement
    */
    private $model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IAdvertisement $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = $this->model->get(null);
        // var_dump(json_decode(User::find(3)->advertisements));
        return view('advertisement.index')->with('ads', $ads);
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
        $ad = $this->model->get($id);
        return view('advertisement.show')->with('ad', $ad);
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
