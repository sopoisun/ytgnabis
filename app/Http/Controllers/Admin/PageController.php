<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'pages' => Page::where('active', 1)->get(),
        ];

        return view(config('app.backend_template').'.page.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.backend_template').'.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        if( Page::simpan($request) ){
            return redirect('/backend/page')->with('success', 'Sukses simpan data page.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data page.']);
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
        $page = Page::find($id);

        if( !$page ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = [
            'page' => $page->load('seo'),
        ];

        return view(config('app.backend_template').'.page.update', $data);
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
        if( Page::ubah($id, $request, ['seo.controller', 'seo.function']) ){
            return redirect('/backend/page')->with('success', 'Sukses ubah data page.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data page.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::hapus($id);

        if( $page ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$page->page_title.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data bisnis.']);
    }
}
