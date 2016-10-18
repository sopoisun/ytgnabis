<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TourCategoryRequest;
use App\Http\Controllers\Controller;
use App\TourCategory;
use Elasticsearch;
use Artisan;

class TourCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = TourCategory::where('active', 1)->orderBy('name')->get();

        $data = [
            'categories' => $categories,
        ];

        return view(config('app.backend_template').'.tour-category.table', $data);
    }

    public function write_to_es()
    {
        Artisan::call('elasticsearch:tour-categories');

        return redirect()->back()->with(['success' => 'Sukses tulis di elasticsearch.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.backend_template').'.tour-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourCategoryRequest $request)
    {
        if( TourCategory::simpan($request) ){
            return redirect('/backend/tour/category')->with('success', 'Sukses simpan data kategori tour.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data kategori tour.']);
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
        $kategori = TourCategory::find($id);

        if( !$kategori ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = ['kategori' => $kategori->load('seo')];
        return view(config('app.backend_template').'.tour-category.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TourCategoryRequest $request, $id)
    {
        if( TourCategory::ubah($id, $request) ){
            return redirect('/backend/tour/category')->with('success', 'Sukses ubah data kategori tour.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data kategori tour.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = TourCategory::hapus($id);

        if( $category ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$category->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data kategori tour.']);
    }
}
