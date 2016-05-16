<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\BusinessProduct;

class ProductCategoryController extends SiteController
{
    public function index()
    {
        $style  = request()->get('style') ? request()->get('style') : "grid";
        $style  = in_array($style, ['grid', 'list']) ? $style : 'grid';

        $this->values['seo'] = $this->values['seo']->load('productCategory');

        $data = BusinessProduct::with(['seo', 'business'])
                ->where('product_category_id', $this->values['relation_id'])
                ->where('active', 1)->orderBy('name')->paginate(9)
                ->setPath(url('permalink/'.$this->permalink))
                ->appends(request()->all());

        $this->values['data'] = $data;

        if( !$data->count() )
        {
            $category = $this->values['seo']['productCategory']['name'];
            $this->values['no_data'] = "<p>Tidak ada produk dengan kategori &quot;<b>".$category."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.products.products-'.$style, $this->values);
    }
}
