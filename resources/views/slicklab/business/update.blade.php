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
        List of product
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Business</a></li>
            <li class="active">Add new business</li>
        </ol>
    </div>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">

    <div class="row">

        <div class="col-lg-7">
            <section class="panel">
                <header class="panel-heading">
                    Add new business
                </header>
                <div class="panel-body">
                    {!! Form::model($business, ['role' => 'form', 'class' => 'form-horizontal']) !!}
                        @include('slicklab.business.form')
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
        <div class="col-lg-5">
            <section class="panel">
                <header class="panel-heading">
                    Map
                </header>
                <div class="panel-body">
                    <div class="alert alert-info fade in">
                       <button data-dismiss="alert" class="close close-sm" type="button">
                           <i class="fa fa-times"></i>
                       </button>
                       <strong>Perhatians!</strong> Silahkan klik map untuk mendapatkan lokasi ( lintang & bujur ).
                   </div>
                   <div id="map" class="gmaps"></div>
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

<!-- Map -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ url('/assets/'.config('app.backend_template')) }}/js/gmaps.js"></script>

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
    $('.select2-multiple').select2({
        placeholder: placeholder
    });

    $("#image").fileinput({
        showUpload: false,
        initialPreview: ["<img src='{{ url('/').'/files/businesses/'.$business->image_url }}' class='file-preview-image'>"],
        initialPreviewConfig: [
            {caption: '{{ str_slug($business->name) }}.jpg', width: '120px', url: '#'},
        ],
        'allowedFileExtensions' : ['jpg', 'png','gif'],
    });

    $('.wysihtml5').wysihtml5();

    // Default to blambangan location
    var defLat  = {{ $business->map_lat }};
    var defLong = {{ $business->map_long }};

    var map = new GMaps({
        div: '#map',
        lat: defLat,
        lng: defLong,
        zoom: 16,
    });

    map.addMarker({
        lat: defLat,
        lng: defLong,
        title: "{{ $business->name }}",
        draggable: true,
        dragend: function(e) {
            var location = {
                lat: e.latLng.lat(),
                long: e.latLng.lng()
            };
            //console.log(location);
            $("#map_lat").val(location.lat);
            $("#map_long").val(location.long);
        }
    });
</script>
@include('slicklab.partials.seo-update-section')
@stop
