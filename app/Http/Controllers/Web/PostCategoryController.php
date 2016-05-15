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
        return Post::with(['seo', 'user'])
                ->where('post_category_id', $this->values['relation_id'])
                ->where('active', 1)->orderBy('post_title')->get();
    }
}
