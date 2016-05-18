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
        $this->values['data'] = Post::with(['seo', 'user', 'category'])
                                ->find($this->values['relation_id']);

        return view(config('app.frontend_template').'.posts.post', $this->values);
    }
}
