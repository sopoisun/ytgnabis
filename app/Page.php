<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use App\Seo;
use Carbon\Carbon;

class Page extends SeoModel
{
    protected $fillable = ['page_title', 'seo_id', 'isi', 'show_in_menu', 'sort', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    public static function showInMenu()
    {
        return self::join('seos', 'pages.seo_id', '=', 'seos.seo_id')
            ->where('pages.active', 1)->where('show_in_menu', 1)->orderBy('sort')
            ->select(['pages.page_title', 'seos.permalink'])->get();
    }

    /* Relation */
    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }
    /* end Relation */

    /* Seo Override */
    public static function simpan( $request )
    {
        $inputs             = $request->all();
        $seo_id             = isset ( $inputs['seo_id'] ) ? $inputs['seo_id'] : self::seoIdAttribute();
        $inputs['seo_id']   = $seo_id;

        if( $request->get('show_in_menu') == 1 ){
            // get last sort number
            $lastSortIdx    = self::select('sort')->orderBy('sort', 'desc')->first();
            $inputs['sort'] = ( $lastSortIdx ) ? $lastSortIdx->sort + 1 : 1;
        }else{
            $inputs['sort'] = 0;
        }

        $result = self::create( $inputs );

        if ( $result ) {

            $inputs['seo']['relation_id']   = $result->id;
            $inputs['seo']['seo_id']        = $seo_id;
            $inputs['seo']['controller']    = isset ( $inputs['seo']['controller'] ) ?
                                              $inputs['seo']['controller'] : self::controllerAttribute();
            $inputs['seo']['function']      = isset ( $inputs['seo']['function'] ) ?
                                              $inputs['seo']['function'] : self::functionAttribute();

            if( Seo::create( $inputs['seo'] ) ){
                return $result;
            }
        }

        return false;
    }

    public static function seoIdAttribute()
    {
        return "PAGE-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "PageController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
    /* end Seo Override */
}
