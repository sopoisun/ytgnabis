<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class ContactController extends SiteController
{
    public function index()
    {
        $this->values['productCategories']  = $this->front->ProductCategories()->get();
        $this->values['businessCategories'] = $this->front->BusinessCategories()->get();
        $this->values['postCategories']     = $this->front->PostCategories()->get();
        $this->values['breadcrumbs']        = [
                [ 'title' => "Home", 'url' => url('/') ],
                [ 'title' => "Contact", 'url' => url('contact') ],
        ];

        return view(config('app.frontend_template').'.contact.contact', $this->values);
    }
}
