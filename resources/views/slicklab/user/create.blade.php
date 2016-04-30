@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Create new user
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">Add new user</li>
        </ol>
    </div>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">

    <div class="row">

        <div class="col-lg-8">
            <section class="panel">
                <header class="panel-heading">
                    Add new user
                </header>
                <div class="panel-body">
                    {!! Form::open(['role' => 'form', 'class' => 'form-horizontal']) !!}
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label for="name" class="col-lg-3 col-sm-3 control-label">Username</label>
                            <div class="col-lg-9">
                                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter username']) }}
                                @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            <label for="email" class="col-lg-3 col-sm-3 control-label">Email</label>
                            <div class="col-lg-9">
                                {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter email address for login']) }}
                                @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label for="password" class="col-lg-3 col-sm-3 control-label">Password</label>
                            <div class="col-lg-9">
                                {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                                @if($errors->has('password'))<span class="help-block">{{ $errors->first('password') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                            <label for="password_confirmation" class="col-lg-3 col-sm-3 control-label">Password Conf</label>
                            <div class="col-lg-9">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) }}
                                @if($errors->has('password_confirmation'))<span class="help-block">{{ $errors->first('password_confirmation') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                <button type="submit" class="btn btn-info btnSubmit">Save</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>

</div>
<!--body wrapper end-->
@stop
