@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Create new role
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Role</a></li>
            <li class="active">Create new role</li>
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
                    Add new role
                </header>
                <div class="panel-body">
                    {!! Form::open(['role' => 'form', 'class' => 'form-horizontal']) !!}
                        @include('slicklab.role.form')
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>

</div>
<!--body wrapper end-->
@stop
