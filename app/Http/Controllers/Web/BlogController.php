<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Post;

class BlogController extends SiteController
{
    public function index()
    {
        return view(config('app.frontend_template').'.posts.blog');

        return Post::with(['seo', 'user'])
                ->where('active', 1)->orderBy('created_at', 'desc')
                ->get();
    }
}
