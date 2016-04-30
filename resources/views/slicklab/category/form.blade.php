<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name">Category name</label>
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter category name']) }}
    @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
</div>
<button type="submit" class="btn btn-info btnSubmit">Save</button>
