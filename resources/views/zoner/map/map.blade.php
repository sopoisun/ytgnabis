@extends('zoner.layout-map')

@section('html_tag_attr') class="page-homepage navigation-fixed-top map-google" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90" @stop

@section('content')
<!--<div class="container">
    <div class="geo-location-wrapper">
        <span class="btn geo-location"><i class="fa fa-map-marker"></i><span class="text">Find My Position</span></span>
    </div>
</div>-->

<!-- Map -->
<div id="map" class="has-parallax"></div>
<!-- end Map -->

<!-- Search Box -->
@include('zoner.map.search-box')
<!-- end Search Box -->
@stop

@section('js_assets')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAnGBfzMEan-bf6oEWoL6j_YmWH0wnzifA"></script>
<script src="{{ url('assets/gmaps/gmaps.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/markerwithlabel_packed.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/infobox.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/icheck.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/tmpl.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/draggable-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.slider.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/markerclusterer_packed.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/custom-map.js"></script>
@stop

@section('js_section')
<script>
    var defLat  = {{ $setting->map_latitude }};
    var defLong = {{ $setting->map_longitude }};
    var markers = [];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        scrollwheel: false,
        center: new google.maps.LatLng(defLat, defLong),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: mapStyles
    });

    TryGeoLocation();

    map.addListener('dragend', function(){
        var attr = $("#btnSearch").attr('disabled');

        if (typeof attr !== typeof undefined && attr !== false) {
            var center = this.getCenter();
            loadData(center);
        }
    });

    @if(isset($data))
    var businesses = {!! $data->toJson(); !!}
    showMarkers(businesses);
    @endif

    function loadData(center){
        $.ajax({
            url: "{{ url('/ajax/load-map') }}?q="+$("#txtSearch").val()+"&lat="+center.lat()+"&lng="+center.lng(),
            type: "GET",
            success: function(res){
                showMarkers(res);
            }
        });
    }

    function showMarkers(data){
        $.each(data, function(i, v){
            var marker = new google.maps.Marker({
                title: v.name,
                position: new google.maps.LatLng(v.map_lat, v.map_long),
                animation: google.maps.Animation.DROP,
                map: map,
                icon: base_url+'/assets/bluemarker.png',
            });

            markers.push(marker);
        });
    }

    function TryGeoLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                map.setCenter(pos);

                //defLat  = position.coords.latitude;
                //defLong = position.coords.longitude;

                var marker = new google.maps.Marker({
                    title: "Your Location",
                    position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                    animation: google.maps.Animation.DROP,
                    map: map,
                    icon: base_url+'/assets/yellowmarker.png',
                });

                markers.push(marker);
            }, function() {
                var pos = {
                    lat: defLat,
                    lng: defLong
                };
                map.setCenter(pos);

                toastr.options.closeButton = true;
                toastr.options.positionClass = "toast-bottom-right";
                toastr.error("Some thing is wrong");
            });
        } else {
            var pos = {
                lat: defLat,
                lng: defLong
            };
            map.setCenter(pos);

            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-bottom-right";
            toastr.error("Your browser does not support geolocation");
        }
    }

    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }

    function clearMarkers() {
        setMapOnAll(null);
    }

    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    $("#form-map").submit(function(e){
        if( $("#txtSearch").val() != "" ){
            $("#txtSearch").attr('readonly', 'readonly');
            $("#btnSearch").attr('disabled', 'disabled');
            $("#btnReset").removeAttr('disabled');

            loadData(map.getCenter());
        }else{
            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-bottom-right";
            toastr.warning('Mohon isi dulu keywordnya...');
        }

        e.preventDefault();
    });

    $("#btnReset").click(function(){
        $.ajax({
            url: "{{ url('/ajax/forget-map') }}",
            type: "GET",
            success: function(){
                $("#btnReset").attr('disabled', 'disabled');
                $("#btnSearch").removeAttr('disabled');
                $("#txtSearch").val("").removeAttr('readonly');

                deleteMarkers(); // Clear markers
                TryGeoLocation(); // Set default Location
            }
        });
    });

</script>
@stop
