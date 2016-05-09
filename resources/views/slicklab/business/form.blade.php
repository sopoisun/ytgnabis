<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name" class="col-lg-3 col-sm-3 control-label">Business name</label>
    <div class="col-lg-9">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter business name']) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.permalink')) has-error @endif">
    <label for="seo[permalink]" class="col-lg-3 col-sm-3 control-label">Permalink</label>
    <div class="col-lg-9">
        {{--*/
            $opts = ['class' => 'form-control', 'id' => 'permalink'];
            if( isset($business) ){ $opts += ['disabled' => 'disabled'];
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
<div class="form-group @if($errors->has('phone')) has-error @endif">
    <label for="name" class="col-lg-3 col-sm-3 control-label">Phone</label>
    <div class="col-lg-9">
        {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Enter phone number']) }}
        @if($errors->has('phone'))<span class="help-block">{{ $errors->first('phone') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('categories')) has-error @endif">
    <label for="name" class="col-lg-3 col-sm-3 control-label">Kategori</label>
    <div class="col-lg-9">
        {{ Form::select('categories[]', $categories, isset($business) ? json_decode($business->categories->lists('id'), true) : [], ['id' => 'categories', 'class' => 'form-control select2-multiple', 'multiple' => 'multiple']) }}
        @if($errors->has('categories'))<span class="help-block">{{ $errors->first('categories') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('map_lat')) has-error @endif">
    <label for="map_lat" class="col-lg-3 col-sm-3 control-label">Map Latitude</label>
    <div class="col-lg-9">
        {{ Form::text('map_lat', null, ['class' => 'form-control', 'id' => 'map_lat', 'readonly' => 'readonly']) }}
        @if($errors->has('map_lat'))<span class="help-block">{{ $errors->first('map_lat') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('map_long')) has-error @endif">
    <label for="map_long" class="col-lg-3 col-sm-3 control-label">Map Longitude</label>
    <div class="col-lg-9">
        {{ Form::text('map_long', null, ['class' => 'form-control', 'id' => 'map_long', 'readonly' => 'readonly']) }}
        @if($errors->has('map_long'))<span class="help-block">{{ $errors->first('map_long') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('address')) has-error @endif">
    <label for="name" class="col-lg-3 col-sm-3 control-label">Address</label>
    <div class="col-lg-9">
        {{ Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address', 'rows' => 3]) }}
        @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
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
        <button type="submit" class="btn btn-info btnSubmit">Save</button>
    </div>
</div>
