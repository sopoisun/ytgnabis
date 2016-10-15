<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\BusinessServiceRequest;
use App\Business;
use App\BusinessService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->get('category') || $request->get('business') ){
            $business = BusinessService::with(['category', 'business']);

            if( $request->get('business') ){
                $business->where('business_id', $request->get('business'));
            }

            $products = $business->where('active', 1)->orderBy('name')->get();
        }else{
            $products = BusinessService::where('active', 1)->orderBy('name')->get();
        }

        $data = [
            'services' => $products->load(['business']),
        ];

        return view(config('app.backend_template').'.service.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'businesses' => Business::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.service.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(BusinessServiceRequest $request)
     {
         if( BusinessService::simpan($request) ){
             return redirect('/backend/service')->with('success', 'Sukses simpan data layanan.');
         }

         return redirect()->back()->withErrors(['failed' => 'Gagal simpan data layanan.']);
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
        $service = BusinessService::find($id);

        if( !$service ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = [
            'service'       => $service->load('seo'),
            'businesses'    => Business::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.service.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(BusinessServiceRequest $request, $id)
     {
         if( BusinessService::ubah($id, $request) ){
             return redirect('/backend/service')->with('success', 'Sukses ubah data layanan.');
         }

         return redirect()->back()->withErrors(['failed' => 'Gagal ubah data layanan.']);
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         $service = BusinessService::hapus($id);

         if( $service ){
             return redirect()->back()->with('success', 'Sukses hapus data '.$service->name.'.');
         }

         return redirect()->back()->withErrors(['failed' => 'Gagal hapus data layanan.']);
     }
}
