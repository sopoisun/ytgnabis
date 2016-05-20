<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Front;

class PostController extends SiteController
{
    public function index()
    {
        $categories = $this->front->PostCategories()->get();
        $this->values['categories'] = $categories;

        $this->values['data'] = $this->front->Posts()
                ->where('posts.id', $this->values['relation_id'])->first();

        return view(config('app.frontend_template').'.posts.post', $this->values);
    }
}
