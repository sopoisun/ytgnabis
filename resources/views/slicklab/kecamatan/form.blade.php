<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name">Districts Name</label>
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter districts name']) }}
    @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
</div>
<div class="form-group @if($errors->has('seo.permalink')) has-error @endif">
    <label for="seo[permalink]">Permalink</label>
    {{--*/
        $opts = ['class' => 'form-control', 'id' => 'permalink'];
        if( isset($kategori) ){ $opts += ['disabled' => 'disabled'];
        }else{ $opts += ['readonly' => 'readonly']; }
    /*--}}
    {{ Form::text('seo[permalink]', null, $opts) }}
    @if($errors->has('seo.permalink'))<span class="help-block">{{ $errors->first('seo.permalink') }}</span>@endif
</div>
<div class="form-group @if($errors->has('seo.site_title')) has-error @endif">
    <label for="seo[site_title]">Site Title</label>
    {{ Form::text('seo[site_title]', null, ['class' => 'form-control', 'id' => 'site_title', 'placeholder' => 'Enter site title districts']) }}
    @if($errors->has('seo.site_title'))<span class="help-block">{{ $errors->first('seo.site_title') }}</span>@endif
</div>
<div class="form-group @if($errors->has('seo.description')) has-error @endif">
    <label for="seo[description]">Description</label>
    {{ Form::textarea('seo[description]', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 3, 'placeholder' => 'Enter description districts']) }}
    @if($errors->has('seo.description'))<span class="help-block">{{ $errors->first('seo.description') }}</span>@endif
</div>
<div class="form-group @if($errors->has('seo.keywords')) has-error @endif">
    <label for="seo[keywords]">Keywords</label>
    {{ Form::textarea('seo[keywords]', null, ['class' => 'form-control', 'id' => 'keywords', 'rows' => 3, 'placeholder' => 'Enter keywords districts']) }}
    @if($errors->has('seo.keywords'))<span class="help-block">{{ $errors->first('seo.keywords') }}</span>@endif
</div>
<div class="form-group @if($errors->has('map_lat')) has-error @endif">
    <label for="map_lat">Map latitude</label>
    {{ Form::text('map_lat', null, ['class' => 'form-control', 'id' => 'map_lat', 'readonly' => 'readonly', 'placeholder' => 'Enter map latitude districts']) }}
    @if($errors->has('map_lat'))<span class="help-block">{{ $errors->first('map_lat') }}</span>@endif
</div>
<div class="form-group @if($errors->has('map_long')) has-error @endif">
    <label for="map_long">Map longitude</label>
    {{ Form::text('map_long', null, ['class' => 'form-control', 'id' => 'map_long', 'readonly' => 'readonly', 'placeholder' => 'Enter map longitude districts']) }}
    @if($errors->has('map_long'))<span class="help-block">{{ $errors->first('map_long') }}</span>@endif
</div>
<button type="submit" class="btn btn-info btnSubmit">Save</button>
