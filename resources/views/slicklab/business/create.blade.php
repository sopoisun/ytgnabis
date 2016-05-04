@extends('slicklab.layout')

@section('css_assets')
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2.css" rel="stylesheet">
<link href="{{ url('/assets/'.config('app.backend_template')) }}/css/select2-bootstrap.css" rel="stylesheet">
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
                    {!! Form::open(['role' => 'form', 'class' => 'form-horizontal']) !!}
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
@stop

@section('js_section')
<script>
    var placeholder = "Select a State";
    $('.select2-multiple').select2({
        placeholder: placeholder
    });

    // Default to blambangan location
    var defLat  = -8.212292045017827;
    var defLong = 114.37672555446625;

    var map = new GMaps({
        div: '#map',
        lat: defLat,
        lng: defLong,
        zoom: 16,
    });

    GMaps.geolocate({
        success: function(position) {
            defLat  = position.coords.latitude;
            defLong = position.coords.longitude;
            map.setCenter(position.coords.latitude, position.coords.longitude);
        },
        error: function(error) {
            // set to blambangan location
            map.setCenter(defLat, defLong);
            //alert('Geolocation failed: '+error.message);
        },
        not_supported: function() {
            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-bottom-right";
            toastr.error("Your browser does not support geolocation");
        },
        always: function() {
            $("#map_lat").val(defLat);
            $("#map_long").val(defLong);

            map.addMarker({
                lat: defLat,
                lng: defLong,
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
        }
    });
</script>
@stop
