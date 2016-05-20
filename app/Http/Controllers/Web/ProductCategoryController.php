<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\ProductBaseController;

class ProductCategoryController extends ProductBaseController
{
    public function index()
    {
        $style  = request()->get('style') ? request()->get('style') : "grid";
        $style  = in_array($style, ['grid', 'list']) ? $style : 'grid';

        $orderBys = [
            'name'          => ['key' => 'business_products.name', 'value' => 'asc', 'text' => 'Urutkan Dari'],
            'harga-murah'   => ['key' => 'business_products.price', 'value' => 'asc', 'text' => 'Harga Termurah'],
            'harga-mahal'   => ['key' => 'business_products.price', 'value' => 'desc', 'text' => 'Harga Termahal'],
        ];
        $this->values['orderBys'] = $orderBys;

        $sort = request()->get('sort') ? request()->get('sort') : "name";
        $orderBy = in_array($sort, array_keys($orderBys)) ? $orderBys[$sort] : $orderBys['name'];

        $this->values['seo']['product'] = $this->values['categories']->where('seo_id', $this->values['seo_id'])->first();

        $data = $this->front->Products()
                ->where('product_category_id', $this->values['relation_id'])
                ->where('business_products.active', 1)->orderBy($orderBy['key'], $orderBy['value'])->paginate(9)
                ->setPath(url($this->permalink))
                ->appends(request()->all());

        $this->values['data']   = $data;
        $this->values['params'] = request()->all();

        if( !$data->count() )
        {
            $category = $this->values['seo']['product']['name'];
            $this->values['no_data'] = "<p>Tidak ada produk dengan kategori &quot;<b>".$category."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.products.products-'.$style, $this->values);
    }
}
