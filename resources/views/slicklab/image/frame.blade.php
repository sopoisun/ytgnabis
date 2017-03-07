@extends('slicklab.layout')

@section('css_assets')
<!--  wysihtml5 -->
<link href="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet">
@stop

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Image Server
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li class="active">Image Server</li>
        </ol>
    </div>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">

    <div class="row">
        <div class="col-lg-12">
            <div style="height:600px; padding:5px; background:#DDD; border-radius:5px;">
                <iframe src="http://dmb.e-wangi.com/kcfinder/index.php?type=images&tokenkey={{ env('IMG_SERVER_KEY') }}"
                    frameborder="0" width="100%" height="100%" marginwidth="0"
                        marginheight="0" scrolling="no"></iframe>
            </div>
        </div>
    </div>

</div>
<!--body wrapper end-->
@stop

@section('js_assets')

@stop

@section('js_section')
<script>

</script>
@stop
