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

        $this->values['breadcrumbs']        = [
                [ 'title' => "Home", 'url' => url('/') ],
                [ 'title' => $this->values['seo']->page->page_title, 'url' => $this->values['permalink'] ],
        ];

        return view(config('app.frontend_template').'.page.page', $this->values);
    }
}
