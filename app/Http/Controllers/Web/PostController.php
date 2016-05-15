<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Post;

class PostController extends SiteController
{
    public function index()
    {
        return Post::with(['seo', 'user', 'category'])
                ->find($this->values['relation_id']);
    }
}
