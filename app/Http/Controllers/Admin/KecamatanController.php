<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\KecamatanRequest;
use App\Http\Controllers\Controller;
use App\Kecamatan;
use Elasticsearch;
use Artisan;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatans = Kecamatan::where('active', 1)->orderBy('name')->paginate(30);

        $data = [
            'kecamatans' => $kecamatans,
        ];

        return view(config('app.backend_template').'.kecamatan.table', $data);
    }

    public function write_to_es()
    {
        Artisan::call('elasticsearch:kecamatans');

        return redirect()->back()->with(['success' => 'Sukses tulis di elasticsearch.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(config('app.backend_template').'.kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KecamatanRequest $request)
    {
        $kecamatan = Kecamatan::simpan($request);
        if( $kecamatan ){
            Artisan::call("elasticsearch:kecamatans", [
                "id" => $kecamatan->id,
            ]);
            return redirect('/backend/kecamatan')->with('success', 'Sukses simpan data kecamatan.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data kecamatan.']);
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
        $kecamatan = Kecamatan::find($id);

        if( !$kecamatan ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = ['kecamatan' => $kecamatan->load('seo')];
        return view(config('app.backend_template').'.kecamatan.update', $data);
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
        if( Kecamatan::ubah($id, $request) ){
            Artisan::call("elasticsearch:kecamatans", [
                "id" => $id,
            ]);
            return redirect('/backend/kecamatan')->with('success', 'Sukses ubah data kecamatan.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data kecamatan.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::hapus($id);

        if( $kecamatan ){
            Elasticsearch::delete([
                'index' => env('ES_INDEX'),
                'type'  => 'kecamatans',
                'id'    => $kecamatan->id
            ]);
            return redirect()->back()->with('success', 'Sukses hapus data '.$kecamatan->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data kecamatan.']);
    }

    public function ajax(Request $request)
    {
        if( $request->get('id') ){
            $id = $request->get('id');
            return Kecamatan::find($id);
        }

        return Kecamatan::where('active', 1)->get();
    }
}
