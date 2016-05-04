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
                        <div class="form-group @if($errors->has('name')) has-error @endif">
                            <label for="name">Name</label>
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter category name']) }}
                            @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
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
