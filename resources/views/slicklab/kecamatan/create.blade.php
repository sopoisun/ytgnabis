@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Tambah Kecamatan
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Kecamatan</a></li>
            <li class="active">Tambah kecamatan baru</li>
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
                    Tambah kecamatan baru
                </header>
                <div class="panel-body">
                    {!! Form::open(['role' => 'form']) !!}
                        @include('slicklab.kecamatan.form')
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
                       <strong>Perhatian!</strong> Silahkan klik map untuk mendapatkan lokasi ( lintang & bujur ).
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
<!-- Map -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDRcPjiRrLTw5_VxU2joPreWQ-KENxHOok"></script>
<script src="{{ url('/assets/'.config('app.backend_template')) }}/js/gmaps.js"></script>
@stop

@section('js_section')
<script>
    // Default to blambangan location
    var defLat  = {{ old('map_lat') ? old('map_lat') : -8.212292045017827 }};
    var defLong = {{ old('map_long') ? old('map_long') : 114.37672555446625 }};

    var map = new GMaps({
        div: '#map',
        lat: defLat,
        lng: defLong,
        zoom: 16,
    });

    GMaps.geolocate({
        success: function(position) {
            @if( !old('map_lat') )
            defLat  = position.coords.latitude;
            defLong = position.coords.longitude;
            map.setCenter(position.coords.latitude, position.coords.longitude);
            @endif
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
@include('slicklab.partials.seo-create-section')
@stop
