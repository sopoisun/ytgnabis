<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\PostBaseController;
use Carbon\Carbon;
use DB;

class ArchiveController extends PostBaseController
{
    public function index()
    {
        if( !request()->get('bulan') ){
            return abort(404);
        }

        $bulan = request()->get('bulan');

        $data = $this->front->Posts()
                ->where(DB::raw('SUBSTRING(posts.created_at, 1, 7)'), $bulan)
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        $this->values['data'] = $data;
        $this->values['archive'] = Carbon::createFromFormat('Y-m', $bulan);

        if( !$data->count() )
        {
            $this->values['no_data'] = "<p>Tidak ada post pada &quot;<b>".$this->values['archive']->format('M Y')."</b>&quot;</p>";
        }

        return view(config('app.frontend_template').'.posts.blog', $this->values);
    }
}
