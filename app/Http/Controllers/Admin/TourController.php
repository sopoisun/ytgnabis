<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\TourRequest;
use App\Tour;
use App\TourCategory;
use App\Kecamatan;
use Gate;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->get('category') ){
            $tours = Tour::whereHas('categories', function($query) use ($request) {
                $query->where('id', $request->get('category'));
            })->where('active', 1)->orderBy('name')->get();
        }else{
            $tours = Tour::where('active', 1)->orderBy('name')->get();
        }

        $data = [
            'tours' => $tours->load('kecamatan'),
        ];

        return view(config('app.backend_template').'.tour.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'kecamatans'    => Kecamatan::where('active', 1)->orderBy('name')->lists('name', 'id'),
            'categories'    => TourCategory::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.tour.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        if( Tour::simpan($request) ){
            return redirect('/backend/tour')->with('success', 'Sukses simpan data wisata.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data wisata.']);
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
        $tour = Tour::find($id);

        if( !$tour ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = [
            'tour'          => $tour->load('seo'),
            'kecamatans'    => Kecamatan::where('active', 1)->orderBy('name')->lists('name', 'id'),
            'categories'    => TourCategory::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.tour.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TourRequest $request, $id)
    {
        if( Tour::ubah($id, $request) ){
            return redirect('/backend/tour')->with('success', 'Sukses ubah data wisata.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data wisata.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::hapus($id);

        if( $tour ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$tour->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data wisata.']);
    }
}
