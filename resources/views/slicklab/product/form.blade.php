<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name" class="col-lg-3 col-sm-3 control-label">Product name</label>
    <div class="col-lg-9">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter product name']) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.permalink')) has-error @endif">
    <label for="seo[permalink]" class="col-lg-3 col-sm-3 control-label">Permalink</label>
    <div class="col-lg-9">
        {{--*/
            $opts = ['class' => 'form-control', 'id' => 'permalink'];
            if( isset($product) ){ $opts += ['disabled' => 'disabled'];
            }else{ $opts += ['readonly' => 'readonly']; }
        /*--}}
        {{ Form::text('seo[permalink]', null, $opts) }}
        @if($errors->has('seo.permalink'))<span class="help-block">{{ $errors->first('seo.permalink') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.site_title')) has-error @endif">
    <label for="seo[site_title]" class="col-lg-3 col-sm-3 control-label">Site Title</label>
    <div class="col-lg-9">
        {{ Form::text('seo[site_title]', null, ['class' => 'form-control', 'id' => 'site_title', 'placeholder' => 'Enter site title page']) }}
        @if($errors->has('seo.site_title'))<span class="help-block">{{ $errors->first('seo.site_title') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('business_id')) has-error @endif">
    <label for="business_id" class="col-lg-3 col-sm-3 control-label">Business name</label>
    <div class="col-lg-9">
        {{ Form::select('business_id', $businesses, null, ['id' => 'business_id', 'class' => 'form-control select2']) }}
        @if($errors->has('business_id'))<span class="help-block">{{ $errors->first('business_id') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('price')) has-error @endif">
    <label for="price" class="col-lg-3 col-sm-3 control-label">Price</label>
    <div class="col-lg-9">
        {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Enter price product']) }}
        @if($errors->has('price'))<span class="help-block">{{ $errors->first('price') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('product_category_id')) has-error @endif">
    <label for="product_category_id" class="col-lg-3 col-sm-3 control-label">Kategori</label>
    <div class="col-lg-9">
        {{ Form::select('product_category_id', $categories, null, ['id' => 'product_category_id', 'class' => 'form-control select2']) }}
        @if($errors->has('product_category_id'))<span class="help-block">{{ $errors->first('product_category_id') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('image')) has-error @endif">
    <label for="image" class="col-lg-3 col-sm-3 control-label">Image</label>
    <div class="col-lg-9">
        {{ Form::file('image', ['class' => 'form-control file', 'id' => 'image']) }}
        @if($errors->has('image'))<span class="help-block">{{ $errors->first('image') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.description')) has-error @endif">
    <label for="seo[description]" class="col-lg-3 col-sm-3 control-label">Description</label>
    <div class="col-lg-9">
        {{ Form::textarea('seo[description]', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 3, 'placeholder' => 'Enter description page']) }}
        @if($errors->has('seo.description'))<span class="help-block">{{ $errors->first('seo.description') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.keywords')) has-error @endif">
    <label for="seo[keywords]" class="col-lg-3 col-sm-3 control-label">Keywords</label>
    <div class="col-lg-9">
        {{ Form::textarea('seo[keywords]', null, ['class' => 'form-control', 'id' => 'keywords', 'rows' => 3, 'placeholder' => 'Enter keywords page']) }}
        @if($errors->has('seo.keywords'))<span class="help-block">{{ $errors->first('seo.keywords') }}</span>@endif
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        {{ Form::hidden('state', isset($product) ? 'old' : 'new') }}
        <button type="submit" class="btn btn-info btnSubmit">Save</button>
    </div>
</div>
