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

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add new user
                </header>
                <div class="panel-body">
                    {!! Form::model($user, ['role' => 'form', 'class' => 'form-horizontal']) !!}
                        @include('slicklab.user.form')
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>

</div>
<!--body wrapper end-->
@stop
