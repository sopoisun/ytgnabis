<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::with(['category', 'user'])->where('active', 1)->get(),
        ];

        return view(config('app.backend_template').'.post.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'categories' => PostCategory::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->merge(['user_id' => auth('web')->user()->id]);
        if( Post::simpan($request) ){
            return redirect('/backend/post')->with('success', 'Sukses simpan data post.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data post.']);
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
        $post = Post::find($id);

        if( !$post ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = [
            'post'          => $post->load('seo'),
            'categories'    => PostCategory::where('active', 1)->lists('name', 'id'),
        ];
        return view(config('app.backend_template').'.post.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        if( Post::ubah($id, $request) ){
            return redirect('/backend/post')->with('success', 'Sukses ubah data post.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data post.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::hapus($id);

        if( $post ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$post->post_title.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data post.']);
    }
}
