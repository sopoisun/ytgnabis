@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        List of product
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Post</a></li>
            <li><a href="#">Category</a></li>
            <li class="active">Edit post category</li>
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
                    Edit post category
                </header>
                <div class="panel-body">
                    {!! Form::model($kategori, ['role' => 'form']) !!}
                        @include('slicklab.post-category.form')
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>

</div>
<!--body wrapper end-->
@stop

@section('js_section')
@include('slicklab.partials.seo-update-section')
@stop
