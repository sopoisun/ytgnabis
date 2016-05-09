<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use App\Seo;
use Carbon\Carbon;

class Business extends SeoModel
{
    protected $fillable = ['name', 'seo_id', 'address', 'map_lat', 'map_long', 'phone', 'counter', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    /* Relation */
    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(BusinessProduct::class);
    }
    /* End Relation */

    /* Action for relation */
    public function addCategory($category)
    {
        if (is_string($category)) {
            $category = Category::where('name', $category)->first();
        }

        return $this->categories()->attach($category);
    }

    public function removeCategory($category)
    {
        if (is_string($category)) {
            $category = Category::where('name', $category)->first();
        }

        return $this->categories()->detach($category);
    }
    /* end Action for relation */

    /* Seo Override */
    public static function simpan( $request )
    {
        $inputs             = $request->all();
        $seo_id             = isset ( $inputs['seo_id'] ) ? $inputs['seo_id'] : self::seoIdAttribute();
        $inputs['seo_id']   = $seo_id;

        $result = self::create( $inputs );

        if ( $result ) {
            $result->addCategory($inputs['categories']);

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
        $current = self::with('categories')->find( $id );
        $oldCategories  = json_decode($current->categories->lists('id'), true);

        if (  $current->update( $request->all() ) ) {

            $newCategories = array_diff($request->get('categories'), $oldCategories);
            if( count($newCategories) ){
                $current->addCategory($newCategories);
            }

            $removeCategories = array_diff($oldCategories, $request->get('categories'));
            if( count($removeCategories) ){
                $current->removeCategory($removeCategories);
            }

            $fields     = ['seo.site_title', 'seo.description', 'seo.keywords'];
            $fields     = array_merge($fields, $custom_fields);
            $seoInputs  = $request->only( $fields );
            if( Seo::where('seo_id', $current->seo_id)->update( $seoInputs['seo'] ) ){
                return $current;
            }
        }

        return false;
    }

    public static function seoIdAttribute()
    {
        return "BSN-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "BusinessController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
    /* Seo Override */
}
