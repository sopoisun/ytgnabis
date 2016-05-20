<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BusinessBaseController;

class BusinessController extends BusinessBaseController
{
    public function index()
    {
        $this->values['data'] = $this->front->Businesses()
            ->where('businesses.id', $this->values['relation_id'])->first();

        $this->values['products'] = $this->front->Products()
            ->where('business_products.business_id', $this->values['relation_id'])
            ->orderBy('business_products.name')
            ->paginate(6);

        return view(config('app.frontend_template').'.business.business', $this->values);
    }
}
