<div class="form-group @if($errors->has('name')) has-error @endif">
    <label for="name" class="col-lg-2 col-sm-2 control-label">Username</label>
    <div class="col-lg-8">
        {{--*/
            $opts = ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter username'];
            if( isset($user) ){
                $opts['readonly'] = 'readonly';
            }
        /*--}}
        {{ Form::text('name', null, $opts) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
    </div>
</div>
@if( !isset($user) )
<div class="form-group @if($errors->has('email')) has-error @endif">
    <label for="email" class="col-lg-2 col-sm-2 control-label">Email</label>
    <div class="col-lg-6">
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter email address for login']) }}
        @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('password')) has-error @endif">
    <label for="password" class="col-lg-2 col-sm-2 control-label">Password</label>
    <div class="col-lg-4">
        {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
        @if($errors->has('password'))<span class="help-block">{{ $errors->first('password') }}</span>@endif
    </div>
</div>
<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
    <label for="password_confirmation" class="col-lg-2 col-sm-2 control-label">Password Conf</label>
    <div class="col-lg-4">
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) }}
        @if($errors->has('password_confirmation'))<span class="help-block">{{ $errors->first('password_confirmation') }}</span>@endif
    </div>
</div>
@endif
<div class="form-group @if($errors->has('roles')) has-error @endif">
    <label for="roles" class="col-lg-2 col-sm-2 control-label">Role</label>
    <div class="col-lg-10">
        {{--*/
            $pageCount = ceil($roles->count() / 4);
        /*--}}
        <div class="row-fluid">
            @for( $i = 0; $i<$pageCount; $i++ )
            {{--*/ $chunks = $roles->forPage(($i+1), 4) /*--}}
                @foreach($chunks as $chunk)
                <div class="col-md-3" style="padding-left:0">
                    <label class="checkbox-custom inline check-info">
                        {{ Form::checkbox('roles[]', $chunk['id'], null, ['id' => 'roles_'.$chunk['id']]) }}
                        <label for="{{ 'roles_'.$chunk['id'] }}">
                            {{ $chunk['name'] }}
                        </label>
                    </label>
                </div>
                @endforeach
            @endfor
            <div style="clear:both;"></div>
        </div>
        @if($errors->has('roles'))<span class="help-block">{{ $errors->first('roles') }}</span>@endif
    </div>
</div>
<div class="form-group">
    <div class="col-lg-offset-2 col-lg-9">
        {{ Form::hidden('state', isset($user) ? 'update' : 'create') }}
        <button type="submit" class="btn btn-info btnSubmit">Save</button>
    </div>
</div>
