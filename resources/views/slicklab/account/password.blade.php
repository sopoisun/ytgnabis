@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Change profile account
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li class="active">Change Profile</li>
        </ol>
    </div>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">

    <div class="row">

        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Change profile account
                </header>
                <div class="panel-body">
                    {!! Form::model($user, ['role' => 'form', 'url' => $act]) !!}
                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            <label for="name">Email</label>
                            {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'readonly' => 'readonly']) }}
                            @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('old_password')) has-error @endif">
                            <label for="old_password">Old Password</label>
                            {{ Form::password('old_password', ['class' => 'form-control', 'id' => 'old_password']) }}
                            @if($errors->has('old_password'))<span class="help-block">{{ $errors->first('old_password') }}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('password')) has-error @endif">
                            <label for="password">Password</label>
                            {{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
                            @if($errors->has('password'))<span class="help-block">{{ $errors->first('password') }}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                            <label for="password_confirmation">Password Conf</label>
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) }}
                            @if($errors->has('password_confirmation'))<span class="help-block">{{ $errors->first('password_confirmation') }}</span>@endif
                        </div>
                        <button type="submit" class="btn btn-info btnSubmit">Save</button>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>

</div>
<!--body wrapper end-->
@stop
