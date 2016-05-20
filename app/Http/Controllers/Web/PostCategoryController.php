<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\PostBaseController;

class PostCategoryController extends PostBaseController
{
    public function index()
    {
        $data = $this->front->Posts()
                ->where('post_category_id', $this->values['relation_id'])
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        $this->values['data'] = $data;

        $this->values['seo']['post'] = $this->values['categories']->where('seo_id', $this->values['seo_id'])->first();

        if( !$data->count() )
        {
            $category = $this->values['seo']['post']['name'];
            $this->values['no_data'] = "<p>Tidak ada post dengan kategori &quot;<b>".$category."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.posts.blog', $this->values);
    }
}
