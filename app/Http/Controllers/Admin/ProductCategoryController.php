<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CategoryProductRequest;
use App\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::where('active', 1)->orderBy('name')->get();

        $data = [
            'categories' => $categories,
        ];

        return view(config('app.backend_template').'.product-category.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.backend_template').'.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryProductRequest $request)
    {
        if( ProductCategory::create($request->all()) ){
            return redirect('/backend/product/category')->with('success', 'Sukses simpan data kategori produk.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data kategori produk.']);
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
        $kategori = ProductCategory::find($id);

        if( !$kategori ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = ['kategori' => $kategori];
        return view(config('app.backend_template').'.product-category.update', $data);
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
        if( ProductCategory::find($id)->update($request->all()) ){
            return redirect('/backend/product/category')->with('success', 'Sukses ubah data kategori produk.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data kategori produk.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = ProductCategory::find($id);

        if( $kategori && $kategori->update(['active' => 0]) ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$kategori->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data kategori bisnis.']);
    }
}
