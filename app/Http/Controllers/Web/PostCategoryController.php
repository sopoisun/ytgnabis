<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;
use App\Post;

class PostCategoryController extends SiteController
{
    public function index()
    {
        return view(config('app.frontend_template').'.posts.blog');

        return Post::with(['seo', 'user'])
                ->where('post_category_id', $this->values['relation_id'])
                ->where('active', 1)->orderBy('created_at', 'desc')
                ->get();
    }
}
