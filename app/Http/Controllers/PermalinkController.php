<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Seo;
use App;

class PermalinkController extends Controller
{
    public function index($permalink = "/")
    {
        $seo = Seo::where('permalink', $permalink)->first();

        if ( !$seo ) {
            abort(404);
        }

        $controller         = $seo['controller'];
        $function           = $seo['function'];

        $__class            = App::make('App\Http\Controllers\Web\\'.$controller);
        $__class->values    = array_merge($__class->values, $seo->toArray());
        $__class->values['seo'] = $seo;
        return $__class->$function();
    }
}
