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
        $data = Post::with(['seo', 'user'])
                ->where('active', 1)->orderBy('created_at', 'desc')
                ->paginate(5);

        $this->values['data'] = $data;

        if( !$data->count() )
        {
            $this->values['no_data'] = "<p>Tidak ada data post di halaman ini</p>";
        }

        return view(config('app.frontend_template').'.posts.blog', $this->values);
    }
}
