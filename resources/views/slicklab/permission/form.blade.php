<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name">Permission name</label>
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter permission name']) }}
    @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
</div>
@if( !isset($permission) )
<div class="form-group @if($errors->has('key')) has-error @endif">
    <label for="key">Permission key</label>
    {{ Form::text('key', null, ['class' => 'form-control', 'id' => 'key', 'placeholder' => 'Enter permission key']) }}
    @if($errors->has('key'))<span class="help-block">{{ $errors->first('key') }}</span>@endif
</div>
@endif
{{ Form::hidden('state', isset($permission) ? 'update' : 'create') }}
<button type="submit" class="btn btn-info btnSubmit">Save</button>
