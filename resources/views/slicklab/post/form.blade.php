<div class="form-group @if($errors->has('post_title')) has-error @endif">
    <label for="post_title" class="col-lg-3 col-sm-3 control-label">Post title</label>
    <div class="col-lg-6">
        {{ Form::text('post_title', null, ['class' => 'form-control', 'id' => 'post_title', 'placeholder' => 'Enter post title']) }}
        @if($errors->has('post_title'))<span class="help-block">{{ $errors->first('post_title') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.permalink')) has-error @endif">
    <label for="seo[permalink]" class="col-lg-3 col-sm-3 control-label">Permalink</label>
    <div class="col-lg-4">
        {{--*/
            $opts = ['class' => 'form-control', 'id' => 'permalink'];
            if( isset($post) ){ $opts += ['disabled' => 'disabled'];
            }else{ $opts += ['readonly' => 'readonly']; }
        /*--}}
        {{ Form::text('seo[permalink]', null, $opts) }}
        @if($errors->has('seo.permalink'))<span class="help-block">{{ $errors->first('seo.permalink') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.site_title')) has-error @endif">
    <label for="seo[site_title]" class="col-lg-3 col-sm-3 control-label">Site Title</label>
    <div class="col-lg-6">
        {{ Form::text('seo[site_title]', null, ['class' => 'form-control', 'id' => 'site_title', 'placeholder' => 'Enter site title page']) }}
        @if($errors->has('seo.site_title'))<span class="help-block">{{ $errors->first('seo.site_title') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('publish')) has-error @endif">
    <label for="publish" class="col-lg-3 col-sm-3 control-label">State</label>
    <div class="col-lg-4">
        {{ Form::select('publish', [1 => 'Publish', 0 => 'Draft'], [], ['id' => 'publish', 'class' => 'form-control select2']) }}
        @if($errors->has('publish'))<span class="help-block">{{ $errors->first('publish') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('post_category_id')) has-error @endif">
    <label for="post_category_id" class="col-lg-3 col-sm-3 control-label">Kategori</label>
    <div class="col-lg-4">
        {{ Form::select('post_category_id', $categories, [], ['id' => 'post_category_id', 'class' => 'form-control select2']) }}
        @if($errors->has('post_category_id'))<span class="help-block">{{ $errors->first('post_category_id') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.description')) has-error @endif">
    <label for="seo[description]" class="col-lg-3 col-sm-3 control-label">Description</label>
    <div class="col-lg-6">
        {{ Form::textarea('seo[description]', null, ['class' => 'form-control', 'id' => 'description', 'rows' => 3, 'placeholder' => 'Enter description page']) }}
        @if($errors->has('seo.description'))<span class="help-block">{{ $errors->first('seo.description') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.keywords')) has-error @endif">
    <label for="seo[keywords]" class="col-lg-3 col-sm-3 control-label">Keywords</label>
    <div class="col-lg-6">
        {{ Form::textarea('seo[keywords]', null, ['class' => 'form-control', 'id' => 'keywords', 'rows' => 3, 'placeholder' => 'Enter keywords page']) }}
        @if($errors->has('seo.keywords'))<span class="help-block">{{ $errors->first('seo.keywords') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('isi')) has-error @endif">
    <label for="isi" class="col-lg-3 col-sm-3 control-label">Content</label>
    <div class="col-lg-9">
        {{ Form::textarea('isi', null, ['class' => 'form-control wysihtml5', 'id' => 'isi', 'rows' => 9]) }}
        @if($errors->has('isi'))<span class="help-block">{{ $errors->first('isi') }}</span>@endif
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        {{ Form::hidden('state', isset($product) ? 'old' : 'new') }}
        <button type="submit" class="btn btn-info btnSubmit">Save</button>
    </div>
</div>
