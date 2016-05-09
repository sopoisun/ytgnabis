<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostCategoryRequest;
use App\Http\Controllers\Controller;
use App\PostCategory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::where('active', 1)->orderBy('name')->get();

        $data = [
            'categories' => $categories,
        ];

        return view(config('app.backend_template').'.post-category.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.backend_template').'.post-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        if( PostCategory::simpan($request) ){
            return redirect('/backend/post/category')->with('success', 'Sukses simpan data kategori post.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data kategori post.']);
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
        $kategori = PostCategory::find($id);

        if( !$kategori ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = ['kategori' => $kategori->load('seo')];
        return view(config('app.backend_template').'.post-category.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, $id)
    {
        if( PostCategory::ubah($id, $request) ){
            return redirect('/backend/post/category')->with('success', 'Sukses ubah data kategori post.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data kategori post.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = PostCategory::hapus($id);

        if( $category ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$category->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data kategori post.']);
    }
}
