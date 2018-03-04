<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Account\AccountEloquent;
use App\Repositories\Category\{
    CategoryEloquent,
    Category
};
use App\Repositories\SubCategory\SubCategoryEloquent;
use App\Repositories\SubCategory\SubCategory;
use App\Repositories\Advertisement\Advertisement;
use App\Repositories\Advertisement\AdvertisementEloquent;
use App\User;
use Auth;
use Config;
use Session;
use Illuminate\Pagination\LengthAwarePaginator as Pagination;

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
     * Category model to work with
     * @var App\Repositories\SubCategory\SubCategoryEloquent
    */
    private $sub_category_model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdvertisementEloquent $model, 
                                CategoryEloquent $category_model,
                                SubCategoryEloquent $sub_category_model)
    {
        $this->model = $model;
        $this->category_model = $category_model;
        $this->sub_category_model = $sub_category_model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = $this->model->get();

        // dd($this->category_model->get(NULL)); die;
        return view('advertisement.index')->with('ads', $ads)
                                          ->with('categories', $this->category_model->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertisement.create')->with('categories', $this->category_model->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->model->getModel()::advertisementRules());

        $input = $request->only(['title',
                                'description',
                                'price',
                                'img_path',
                                'sub_category_id']);

        if ($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
    
            $destinationPath = '/uploads/advertisements/';
            $image->move(public_path($destinationPath), $fileName);

            $input['img_path'] = $destinationPath . $fileName;
        }

        if(!$input['description']) {
            unset($input['description']);
        }

        $input['user_id'] = Auth::user()->id;
        $input['sub_category_id'] = ++$input['sub_category_id'];
        $input['category_id'] = $this->sub_category_model->get($input['sub_category_id'])->category_id;

        $this->model->create($input);

        return redirect()->route('profile.edit', 'adverts')->with('new_ad_success', trans('forms.new_ad_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id = decrypt($id);
        $ad = $this->model->get($id);
        
        return view('advertisement.show')->with('ad', $ad)
                                         ->with('categories', $this->category_model->get());
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
                                         ->with('categories', $this->category_model->get());
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
        $this->validate($request, $this->model->getModel()::advertisementRules());

        $input = $request->only(['title',
                                'description',
                                'price',
                                'sub_category_id',
                                'img_path']);

        if ($request->hasFile('img_path')) {
            $image = $request->file('img_path');
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time() . '.' . $image->getClientOriginalExtension();
    
            $destinationPath = '/uploads/advertisements/';
            $image->move(public_path($destinationPath), $fileName);

            $input['img_path'] = $destinationPath . $fileName;
        }

        $input['id'] = $id;
        $input['sub_category_id'] = ++$input['sub_category_id'];
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
        $ads->selected_category = $ads[0]->category_id - 1;

        return view('advertisement.index')->with('ads', $ads)
                                          ->with('categories', $this->category_model->get());
    }

    /**
     * Filter ads
     *
     * @param Request $request
     * @return void
     */
    public function filter(Request $request) {
        $input = $request->only([
                                'sub_category',
                                'price_from',
                                'price_to'
                            ]);
        $ads = $this->model->getAll();
        $filtered_data = collect();

        if ($request->search_term) {
            foreach($ads as $ad) {
                $ad_name = strtolower($ad->title);
                $search_term = strtolower($request->search_term);
                if ( strpos($ad_name, $search_term) !== false ) {
                    $filtered_data->prepend($ad);
                }
            }
        } 
        else {
            $filtered_data = $ads;

            if ( isset($input['sub_category']) ) {
                $filtered_data = Advertisement::whereIn('sub_category_id', array_flatten($input['sub_category']))->get();
            }

            if ( isset($input['price_from']) && isset($input['price_to']) ) {
                foreach($filtered_data as $key => $ad) {
                    if ( $input['price_from'] > $ad->price || 
                         $input['price_to'] < $ad->price ) 
                    {
                        $filtered_data->forget($key);
                    }
                }
            }
        }

        if ( $filtered_data->isNotEmpty() ) {
            $filtered_data = new Pagination($filtered_data, 
                                            count($filtered_data), 
                                            Config::get('settings.pagination.limit'));
            $filtered_data->selected_category = $filtered_data->first()->category_id - 1;
        }
        
        return view('advertisement.index')->with('ads', $filtered_data)
                                          ->with('categories', $this->category_model->get());
    }
}
