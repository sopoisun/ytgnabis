<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name" class="col-lg-3 col-sm-3 control-label">Business name</label>
    <div class="col-lg-9">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter business name']) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
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
        {{ Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address']) }}
        @if($errors->has('address'))<span class="help-block">{{ $errors->first('address') }}</span>@endif
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-info btnSubmit">Save</button>
    </div>
</div>
