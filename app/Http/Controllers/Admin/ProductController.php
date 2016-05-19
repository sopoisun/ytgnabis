<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\BusinessProductRequest;
use App\Business;
use App\BusinessProduct;
use App\ProductCategory;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if( $request->get('category') || $request->get('business') ){
            $business = BusinessProduct::with(['category', 'business']);

            if( $request->get('category') ){
                $business->where('product_category_id', $request->get('category'));
            }

            if( $request->get('business') ){
                $business->where('business_id', $request->get('business'));
            }

            $products = $business->where('active', 1)->orderBy('name')->get();
        }else{
            $products = BusinessProduct::where('active', 1)->orderBy('name')->get();
        }

        $data = [
            'products' => $products->load(['category', 'business']),
        ];

        return view(config('app.backend_template').'.product.table', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [
            'businesses' => Business::where('active', 1)->lists('name', 'id'),
            'categories' => ProductCategory::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessProductRequest $request)
    {
        if( BusinessProduct::simpan($request) ){
            return redirect('/backend/product')->with('success', 'Sukses simpan data produk.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal simpan data produk.']);
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
        $product = BusinessProduct::find($id);

        if( !$product ){
            return view(config('app.backend_template').'.error.404');
        }

        $data = [
            'product'       => $product->load('seo'),
            'businesses'    => Business::where('active', 1)->lists('name', 'id'),
            'categories'    => ProductCategory::where('active', 1)->lists('name', 'id'),
        ];

        return view(config('app.backend_template').'.product.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BusinessProductRequest $request, $id)
    {
        if( BusinessProduct::ubah($id, $request) ){
            return redirect('/backend/product')->with('success', 'Sukses ubah data produk.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal ubah data produk.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = BusinessProduct::hapus($id);

        if( $product ){
            return redirect()->back()->with('success', 'Sukses hapus data '.$product->name.'.');
        }

        return redirect()->back()->withErrors(['failed' => 'Gagal hapus data produk.']);
    }
}
