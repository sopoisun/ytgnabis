<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Elasticsearch;
use Artisan;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('active', 1)->orderBy('name')->get();

        $data = [
            'categories' => $categories,
        ];

        return view(config('app.backend_template').'.category.table', $data);
    }

    public function write_to_es()
    {
        Artisan::call('elasticsearch:business-categories');

        return redirect()->back()->with(['success' => 'Sukses tulis di elasticsearch.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.backend_template').'.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::simpan($request);
        if( $category ){
            Artisan::call("elasticsearch:business-categories", [
                "id" => $category->id,
            ]);
            return redirect('/backend/business/category')->with('success', 'Sukses simpan data kategori bisnis.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data kategori bisnis.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Category::find($id);

        if( !$kategori ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = ['kategori' => $kategori->load('seo')];
        return view(config('app.backend_template').'.category.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        if( Category::ubah($id, $request) ){
            Artisan::call("elasticsearch:business-categories", [
                "id" => $id,
            ]);
            return redirect('/backend/business/category')->with('success', 'Sukses ubah data kategori bisnis.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data kategori bisnis.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::hapus($id);

        if( $category ){
            Elasticsearch::delete([
                'index' => env('ES_INDEX'),
                'type'  => 'business-categories',
                'id'    => $id
            ]);
            return redirect()->back()->with('success', 'Sukses hapus data '.$category->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data kategori bisnis.']);
    }
}
