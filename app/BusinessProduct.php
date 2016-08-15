<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SeoModel;
use Carbon\Carbon;
use Image;

class BusinessProduct extends SeoModel
{
    protected $fillable = ['business_id', 'seo_id', 'name', 'price', 'image_url', 'about', 'product_category_id',
                                'counter', 'active'];
    protected $hidden   = ['created_at', 'updated_at'];

    /* Relation */
    public function seo()
    {
        return $this->hasOne(Seo::class, 'seo_id', 'seo_id');
    }

    public function business()
    {
    	return $this->belongsTo(Business::class);
    }

    public function category()
    {
    	return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
    /* end Rellation */

    /* Seo Override */
    public static function simpan( $request )
    {
        // for database
        $inputs = $request->only(['business_id', 'name', 'price', 'about', 'product_category_id', 'seo']);

        // Upload image
        if( $request->hasFile('image') ){
            if( $request->file('image')->isValid() )
            {
                $ext    = $request->file('image')->getClientOriginalExtension();
                $imgUrl = str_slug($request->get('name')).'-'.str_slug(str_random(40)).'.'.$ext;
                $request->file('image')->move(public_path().'/files/products', $imgUrl);
                $thumb = Image::make(public_path().'/files/products/'.$imgUrl);
                $thumb->resize(120, 120);
                $thumb->save(public_path().'/files/products/thumbs/'.$imgUrl);

                $inputs  += [ 'image_url' => $imgUrl ];
            }
        }

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
        $inputs = $request->only(['business_id', 'name', 'price', 'about', 'product_category_id']);

        $current = self::find( $id );

        // Upload Image
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                if( $current->image_url != NULL )
                {
                    unlink(public_path().'/files/products/'.$current->image_url);
                }
                $ext    = $request->file('image')->getClientOriginalExtension();
                $imgUrl = str_slug($request->get('name')).'-'.str_slug(str_random(40)).'.'.$ext;
                $request->file('image')->move(public_path().'/files/products', $imgUrl);
                $thumb = Image::make(public_path().'/files/products/'.$imgUrl);
                $thumb->resize(120, 120);
                $thumb->save(public_path().'/files/products/thumbs/'.$imgUrl);

                $inputs += [ 'image_url' => $imgUrl ];
            }
        }

        if (  $current->update( $inputs ) ) {
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
        return "PROD-".Carbon::now()->format('dmyhis').str_random(5);
    }

    public static function controllerAttribute()
    {
        return "ProductController";
    }

    public static function functionAttribute()
    {
        return "index";
    }
    /* end Seo Override */
}
