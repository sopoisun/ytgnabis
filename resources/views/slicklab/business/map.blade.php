@extends('slicklab.layout')

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Map of business
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li><a href="#">Business</a></li>
            <li class="active">Map of business</li>
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
                    Map
                    <span class="tools pull-right">
                        <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                        <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close fa fa-times" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ url('/assets/'.config('app.backend_template')) }}/js/gmaps.js"></script>
@stop

@section('js_section')
<script>
    // Default to blambangan location
    var defLat  = -8.212292045017827;
    var defLong = 114.37672555446625;

    var map = new GMaps({
        div: '#map',
        lat: defLat,
        lng: defLong,
        zoom: 14,
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
            @foreach($businesses as $business)
            map.addMarker({
                lat: {{ $business->map_lat }},
                lng: {{ $business->map_long }},
                title: "{{ $business->name }}",
                infoWindow: {
                  content: '<p>{{ $business->name }}</p>'
                }
            });
            @endforeach
        }
    });
</script>
@stop
