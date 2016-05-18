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
        $this->values['seo'] = $this->values['seo']->load('postCategory');

        $data = Post::with(['seo', 'user'])
                ->where('post_category_id', $this->values['relation_id'])
                ->where('active', 1)->orderBy('created_at', 'desc')
                ->paginate(5);

        $this->values['data'] = $data;

        if( !$data->count() )
        {
            $category = $this->values['seo']['postCategory']['name'];
            $this->values['no_data'] = "<p>Tidak ada post dengan kategori &quot;<b>".$category."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.posts.blog', $this->values);
    }
}
