<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seo;

class SeoModel extends Model
{
    public static function simpan( $request )
    {
        $inputs             = $request->all();
        $seo_id             = isset ( $inputs['seo_id'] ) ? $inputs['seo_id'] : self::seoIdAttribute();
        $inputs['seo_id']   = $seo_id;

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

    public static function ubah( $id, $request, $custom_fields = [] )
    {
        $current = self::find( $id );
        if (  $current->update( $request->all() ) ) {
            $fields     = ['seo.site_title', 'seo.description', 'seo.keywords'];
            $fields     = array_merge($fields, $custom_fields);
            $seoInputs  = $request->only( $fields );
            if( Seo::where('seo_id', $current->seo_id)->update( $seoInputs['seo'] ) ){
                return $current;
            }
        }

        return false;
    }

    public static function hapus( $id )
    {
        $current = self::find( $id );
        if (  $current->update(['active' => 0]) ) {
            if( Seo::where('seo_id', $current->seo_id)->delete() ){
                return $current;
            }
        }

        return false;
    }
}
