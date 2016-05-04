<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Category;

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
        if( Category::create($request->all()) ){
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

        $data = ['kategori' => $kategori];
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
        if( Category::find($id)->update($request->all()) ){
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
        $kategori = Category::find($id);

        if( $kategori && $kategori->update(['active' => 0]) ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$kategori->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data kategori bisnis.']);
    }
}
