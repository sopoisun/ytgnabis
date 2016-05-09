<div class="form-group @if($errors->has('page_title')) has-error @endif">
    <label for="page_title" class="col-lg-3 col-sm-3 control-label">Page title</label>
    <div class="col-lg-5">
        {{ Form::text('page_title', null, ['class' => 'form-control', 'id' => 'page_title', 'placeholder' => 'Enter page title']) }}
        @if($errors->has('page_title'))<span class="help-block">{{ $errors->first('page_title') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.permalink')) has-error @endif">
    <label for="seo[permalink]" class="col-lg-3 col-sm-3 control-label">Permalink</label>
    <div class="col-lg-6">
        {{--*/
            $opts = ['class' => 'form-control', 'id' => 'permalink'];
            if( isset($page) ){ $opts += ['disabled' => 'disabled'];
            }else{ $opts += ['readonly' => 'readonly']; }
        /*--}}
        {{ Form::text('seo[permalink]', null, $opts) }}
        @if($errors->has('seo.permalink'))<span class="help-block">{{ $errors->first('seo.permalink') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.site_title')) has-error @endif">
    <label for="seo[site_title]" class="col-lg-3 col-sm-3 control-label">Site Title</label>
    <div class="col-lg-7">
        {{ Form::text('seo[site_title]', null, ['class' => 'form-control', 'id' => 'site_title', 'placeholder' => 'Enter site title page']) }}
        @if($errors->has('seo.site_title'))<span class="help-block">{{ $errors->first('seo.site_title') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('show_in_menu')) has-error @endif">
    <label for="show_in_menu" class="col-lg-3 col-sm-3 control-label">Show in menu</label>
    <div class="col-lg-4">
        {{ Form::select('show_in_menu', [1 => 'Yes', 0 => 'No'], [], ['id' => 'show_in_menu', 'class' => 'form-control select2']) }}
        @if($errors->has('show_in_menu'))<span class="help-block">{{ $errors->first('show_in_menu') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.controller')) has-error @endif">
    <label for="seo[controller]" class="col-lg-3 col-sm-3 control-label">Controller</label>
    <div class="col-lg-4">
        {{ Form::text('seo[controller]', null, ['class' => 'form-control', 'id' => 'controller', 'placeholder' => 'Enter controller']) }}
        @if($errors->has('seo.controller'))<span class="help-block">{{ $errors->first('seo.controller') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('seo.function')) has-error @endif">
    <label for="seo[function]" class="col-lg-3 col-sm-3 control-label">Function</label>
    <div class="col-lg-4">
        {{ Form::text('seo[function]', null, ['class' => 'form-control', 'id' => 'function', 'placeholder' => 'Enter function']) }}
        @if($errors->has('seo.function'))<span class="help-block">{{ $errors->first('seo.function') }}</span>@endif
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
        {{ Form::hidden('state', isset($page) ? 'old' : 'new') }}
        <button type="submit" class="btn btn-info btnSubmit">Save</button>
    </div>
</div>
