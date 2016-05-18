<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class PageController extends SiteController
{
    public function index()
    {
        $this->values['seo']    = $this->values['seo']->load('page');
        $this->values['data']   = $this->values['seo']->page;

        return view(config('app.frontend_template').'.page.page', $this->values);
    }
}
