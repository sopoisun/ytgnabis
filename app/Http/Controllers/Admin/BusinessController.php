<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\BusinessRequest;
use App\Business;
use App\Category;
use Gate;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( Gate::denies('business.read') ){
            return "Not Accept";
            return view(config('app.template').'.error.403');
        }

        if( $request->get('category') ){
            $businesses = Business::whereHas('categories', function($query) use ($request) {
                $query->where('id', $request->get('category'));
            })->where('active', 1)->orderBy('name')->get();
        }else{
            $businesses = Business::where('active', 1)->orderBy('name')->get();
        }

        $data = [
            'businesses' => $businesses,
        ];

        return view(config('app.backend_template').'.business.table', $data);
    }

    public function map(Request $request)
    {
        if( $request->get('category') ){
            $businesses = Business::whereHas('categories', function($query) use ($request) {
                $query->where('id', $request->get('category'));
            })->where('active', 1)->get();
        }else{
            $businesses = Business::where('active', 1)->get();
        }

        $data = [
            'businesses' => $businesses,
        ];

        return view(config('app.backend_template').'.business.map', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => Category::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.business.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessRequest $request)
    {
        $business = Business::create($request->all());

        $business->addCategory($request->get('categories'));

        if( $business ){
            return redirect('/backend/business')->with('success', 'Sukses simpan data bisnis.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data bisnis.']);
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
        $business = Business::find($id);

        if( !$business ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = [
            'business' => $business,
            'categories' => Category::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.business.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessRequest $request, $id)
    {
        $business       = Business::find($id);
        $oldCategories  = json_decode($business->categories->lists('id'), true);

        if( $business->update($request->all()) ){

            $newCategories = array_diff($request->get('categories'), $oldCategories);
            if( count($newCategories) ){
                $business->addCategory($newCategories);
            }

            $removeCategories = array_diff($oldCategories, $request->get('categories'));
            if( count($removeCategories) ){
                $business->removeCategory($removeCategories);
            }

            return redirect('/backend/business')->with('success', 'Sukses ubah data bisnis.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data bisnis.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $business = Business::find($id);

        if( $business && $business->update(['active' => 0]) ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$business->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data bisnis.']);
    }
}
