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

        return view(config('app.frontend_template').'.posts.post', $this->values);
    }
}
