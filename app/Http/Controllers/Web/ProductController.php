<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\ProductBaseController;

class ProductController extends ProductBaseController
{
    public function index()
    {
        $this->values["data"] = $this->front->Products()
            ->where('business_products.id', $this->values['relation_id'])->first();

        $this->values['sames'] = $this->front->ProductSame(
            $this->values['data']['category_id'],
            $this->values['data']['name'],
            $this->values['relation_id']
        );

        return view(config('app.frontend_template').'.products.product', $this->values);
    }
}
