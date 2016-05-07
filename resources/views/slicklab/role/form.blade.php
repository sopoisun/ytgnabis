<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name" class="col-lg-2 col-sm-2 control-label">Role name</label>
    <div class="col-lg-6">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter role name']) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
    </div>
</div>
@if( !isset($role) )
<div class="form-group @if($errors->has('key')) has-error @endif">
    <label for="key" class="col-lg-2 col-sm-2 control-label">Role key</label>
    <div class="col-lg-4">
        {{ Form::text('key', null, ['class' => 'form-control', 'id' => 'key', 'placeholder' => 'Enter role key']) }}
        @if($errors->has('key'))<span class="help-block">{{ $errors->first('key') }}</span>@endif
    </div>
</div>
@endif
<div class="form-group @if($errors->has('permissions')) has-error @endif">
    <label for="permissions" class="col-lg-2 col-sm-2 control-label">Permission</label>
    <div class="col-lg-10">
        {{--*/
            $Cpermissions = $permissions->groupBy('group_key');
        /*--}}
        <div class="row-fluid">
            @foreach($Cpermissions as $key => $Cpermission)
            <h5 style="font-weight:bold;">{{ ucfirst(str_replace('_', ' ', $key)) }}</h5>
            {{--*/
                $pageCount = ceil($Cpermission->count() / 4);
            /*--}}
            @for( $i = 0; $i<$pageCount; $i++ )
            {{--*/ $chunks = $Cpermission->forPage(($i+1), 4) /*--}}
                @foreach($chunks as $chunk)
                <div class="col-md-3" style="padding-left:0">
                    <label class="checkbox-custom inline check-info">
                        {{ Form::checkbox('permissions[]', $chunk['id'], null, ['id' => 'permissions_'.$chunk['id']]) }}
                        <label for="{{ 'permissions_'.$chunk['id'] }}">{{ $chunk['name'] }}</label>
                    </label>
                </div>
                @endforeach
            @endfor
            <div style="clear:both;"></div>

            @endforeach
        </div>
        @if($errors->has('permissions'))<span class="help-block">{{ $errors->first('permissions') }}</span>@endif
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {{ Form::hidden('state', isset($role) ? 'update' : 'create') }}
        <button type="submit" class="btn btn-info btnSubmit">Save Role</button>
    </div>
</div>
