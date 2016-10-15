@extends('slicklab.layout')

@section('css_assets')
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2.css" rel="stylesheet">
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2-bootstrap.css" rel="stylesheet">

<!--bootstrap-fileinput-master-->
<link rel="stylesheet" type="text/css" href="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-fileinput-master/css/fileinput.css" />

<!--  wysihtml5 -->
<link href="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet">
@stop

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Create new service
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Service</a></li>
            <li class="active">Create new service</li>
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
                    Add new service
                </header>
                <div class="panel-body">
                    {!! Form::open(['role' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'accept' => 'image/*']) !!}
                        @include('slicklab.service.form')
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

<!--bootstrap-wysihtml5-->
<script src="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
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

    $('.wysihtml5').wysihtml5();
</script>
@include('slicklab.partials.seo-create-section')
@stop
