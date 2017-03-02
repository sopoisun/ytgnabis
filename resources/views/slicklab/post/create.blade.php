@extends('slicklab.layout')

@section('css_assets')
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2.css" rel="stylesheet">
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2-bootstrap.css" rel="stylesheet">
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
            <li><a href="#">Post</a></li>
            <li class="active">Create new post</li>
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
                    Add new post
                </header>
                <div class="panel-body">
                    {!! Form::open(['role' => 'form', 'class' => 'form-horizontal']) !!}
                        @include('slicklab.post.form')
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

<!-- CKEditor -->
<script src="{{ url('/jseditor') }}/ckeditor/ckeditor.js"></script>
@stop

@section('js_section')
<script>
    var placeholder = "Select a State";
    $('.select2').select2({
        placeholder: placeholder
    });

    /*CKEDITOR.replace('isi', {
        filebrowserBrowseUrl: '{{ url("/jseditor/kcfinder/browse.php?type=files") }}',
        filebrowserImageBrowseUrl: '{{ url("/jseditor/kcfinder/browse.php?type=images") }}',
        filebrowserFlashBrowseUrl: '{{ url("/jseditor/kcfinder/browse.php?type=flash") }}',
        filebrowserUploadUrl: '{{ url("/jseditor/kcfinder/upload.php?type=files") }}',
        filebrowserImageUploadUrl: '{{ ("/jseditor/kcfinder/upload.php?type=images") }}',
        filebrowserFlashUploadUrl: '{{ url("/jseditor/kcfinder/upload.php?type=flash") }}'
    });*/
</script>
@include('slicklab.partials.seo-create-section', ['mainComponent' => 'post_title'])
@stop
