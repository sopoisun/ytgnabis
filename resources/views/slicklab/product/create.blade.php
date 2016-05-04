@extends('slicklab.layout')

@section('css_assets')
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2.css" rel="stylesheet">
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2-bootstrap.css" rel="stylesheet">

<!--bootstrap-fileinput-master-->
<link rel="stylesheet" type="text/css" href="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-fileinput-master/css/fileinput.css" />
@stop

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Create new product
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Create new product</li>
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
                    Add new product
                </header>
                <div class="panel-body">
                    {!! Form::open(['role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'accept' => 'image/*']) !!}
                        @include('slicklab.product.form')
                    {!! Form::close() !!}
                </div>
            </section>
        </div>

    </div>

</div>
<!--body wrapper end-->
@stop

@section('js_assets')
<!-- Select2 --->
<script src="{{ url('/assets/'.config('app.backend_template')) }}/js/select2.js"></script>

<!--bootstrap-fileinput-master-->
<script type="text/javascript" src="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-fileinput-master/js/fileinput.js"></script>
<!--<script type="text/javascript" src="{{ url('/assets/'.config('app.backend_template')) }}/js/file-input-init.js"></script>-->
@stop

@section('js_section')
<script>
    var placeholder = "Select a State";
    $('.select2').select2({
        placeholder: placeholder
    });

    $("#image").fileinput({
        showUpload: false,
        'allowedFileExtensions' : ['jpg', 'png','gif'],
    });
</script>
@stop
