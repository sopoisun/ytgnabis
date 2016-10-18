<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\BusinessRequest;
use App\Business;
use App\Category;
use App\Kecamatan;
use Gate;
use Elasticsearch;
use Artisan;

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
            'businesses' => $businesses->load('kecamatan'),
        ];

        return view(config('app.backend_template').'.business.table', $data);
    }

    public function write_to_es()
    {
        Artisan::call('elasticsearch:businesses');

        return redirect()->back()->with(['success' => 'Sukses tulis di elasticsearch.']);
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
            'kecamatans'    => Kecamatan::where('active', 1)->orderBy('name')->lists('name', 'id'),
            'categories'    => Category::where('active', 1)->lists('name', 'id'),
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
        $business = Business::simpan($request);
        if( $business ){
            Artisan::call("elasticsearch:businesses", [
                "id" => $business->id,
            ]);
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
            'business'      => $business->load('seo'),
            'kecamatans'    => Kecamatan::where('active', 1)->orderBy('name')->lists('name', 'id'),
            'categories'    => Category::where('active', 1)->lists('name', 'id'),
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
        if( Business::ubah($id, $request) ){
            Artisan::call("elasticsearch:businesses", [
                "id" => $id,
            ]);
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
        $business = Business::hapus($id);

        if( $business ){
            Elasticsearch::delete([
                'index' => 'e-wangi',
                'type'  => 'businesses',
                'id'    => $business->id
            ]);
            return redirect()->back()->with('success', 'Sukses hapus data '.$business->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data bisnis.']);
    }
}
