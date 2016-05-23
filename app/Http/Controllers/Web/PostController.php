<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\PostBaseController;

class PostController extends PostBaseController
{
    public function index()
    {
        $this->values['data'] = $this->front->Posts()
                ->where('posts.id', $this->values['relation_id'])->first();

        $this->values['breadcrumbs'] = array_merge($this->values['breadcrumbs'], [
            [ 'title' => $this->values['data']['post_title'], 'url' => $this->values['permalink'] ],
        ]);

        $this->front->Cache('post', $this->values['relation_id']);

        return view(config('app.frontend_template').'.posts.post', $this->values);
    }
}
