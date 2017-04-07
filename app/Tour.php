<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use App\Seo;
use App\Kecamatan;
use Carbon\Carbon;
use Image;

class Tour extends SeoModel
{
    protected $fillable = ['name', 'seo_id', 'address', 'map_lat', 'map_long', 'phone', 'image_url', 'about',
                            'counter', 'tiket', 'active', 'kecamatan_id'];
    protected $hidden   = ['created_at', 'updated_at'];

    /* Relation */
    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function categories()
    {
        return $this->belongsToMany(TourCategory::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    /* End Relation */

    /* Action for relation */
    public function addCategory($category)
    {
        if (is_string($category)) {
            $category = TourCategory::where('name', $category)->first();
        }

        return $this->categories()->attach($category);
    }

    public function removeCategory($category)
    {
        if (is_string($category)) {
            $category = TourCategory::where('name', $category)->first();
        }

        return $this->categories()->detach($category);
    }
    /* end Action for relation */

    /* Seo Override */
    public static function simpan( $request )
    {
        $inputs = $request->all();

        /*
        // Upload image
        if( $request->hasFile('image') ){
            if( $request->file('image')->isValid() )
            {
                $ext    = $request->file('image')->getClientOriginalExtension();
                $imgUrl = str_slug($request->get('name')).'-'.str_slug(str_random(40)).'.'.$ext;
                $request->file('image')->move(public_path().'/files/tourises', $imgUrl);
                $thumb = Image::make(public_path().'/files/tourises/'.$imgUrl);
                $thumb->resize(120, 120);
                $thumb->save(public_path().'/files/tourises/thumbs/'.$imgUrl);

                $inputs  += [ 'image_url' => $imgUrl ];
            }
        }
        */

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
        $inputs = $request->all();

        $current = self::find( $id );
        $oldCategories  = json_decode($current->categories->lists('id'), true);

        /*
        // Upload Image
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                if( $current->image_url != NULL ){
                    unlink(public_path().'/files/tourises/'.$current->image_url);
                    unlink(public_path().'/files/tourises/thumbs/'.$current->image_url);
                }
                $ext    = $request->file('image')->getClientOriginalExtension();
                $imgUrl = str_slug($request->get('name')).'-'.str_slug(str_random(40)).'.'.$ext;
                $request->file('image')->move(public_path().'/files/tourises', $imgUrl);
                $thumb = Image::make(public_path().'/files/tourises/'.$imgUrl);
                $thumb->resize(120, 120);
                $thumb->save(public_path().'/files/tourises/thumbs/'.$imgUrl);

                $inputs += [ 'image_url' => $imgUrl ];
            }
        }
        */

        if (  $current->update( $inputs ) ) {

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

    public static function hapus( $id )
    {
        $current = self::find( $id );
        if (  $current->update(['active' => 0]) ) {
            if( Seo::where('seo_id', $current->seo_id)->delete() ){
                unlink(public_path().'/files/tourises/'.$current->image_url);
                unlink(public_path().'/files/tourises/thumbs/'.$current->image_url);

                return $current;
            }
        }

        return false;
    }

    public static function seoIdAttribute()
    {
        return "TOUR-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "TourController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
    /* Seo Override */
}
