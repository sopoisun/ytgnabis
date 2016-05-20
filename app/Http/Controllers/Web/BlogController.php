<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\SiteController;

class BlogController extends SiteController
{
    public function index()
    {
        $data = $this->front->Posts();

        if( request()->get('cari') ){
            $cari =  str_replace('-', ' ', request()->get('cari'));
            $data->where('posts.post_title', 'like', '%'.$cari.'%');
        }

        $data = $data->orderBy('posts.created_at', 'desc')->paginate(5);

        $this->values['data'] = $data;

        $categories = $this->front->PostCategories()->get();
        $this->values['categories'] = $categories;

        if( !$data->count() )
        {
            $this->values['no_data'] = "<p>Tidak ada data post di halaman ini</p>";
        }

        return view(config('app.frontend_template').'.posts.blog', $this->values);
    }
}
