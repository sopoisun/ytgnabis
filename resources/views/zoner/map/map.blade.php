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
<div class="search-box-wrapper">
    <div class="search-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="search-box map">
                        <form role="form" id="form-map" class="form-map form-search">
                            <h2>Cari Produk / Jasa</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" id="txtSearch" placeholder="Kata Kunci" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" class="btn btn-default" id="btnSearch">Cari Sekarang</button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="button" class="btn btn-warning"  id="btnReset" disabled="disabled">Reset</button>
                                    </div>
                                </div>
                            </div><!-- /.form-group -->
                        </form><!-- /#form-map -->
                    </div><!-- /.search-box.map -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.search-box-inner -->
</div>
<!-- end Search Box -->
@stop

@section('js_assets')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
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
    /*_latitude = 48.87;
    _longitude = 2.29;
    createHomepageGoogleMap(_latitude,_longitude);
    $(window).load(function(){
        initializeOwl(false);
    });*/

    $("#form-map").submit(function(e){
        if( $("#txtSearch").val() != "" ){
            $("#txtSearch").attr('readonly', 'readonly');
            $("#btnSearch").attr('disabled', 'disabled');
            $("#btnReset").removeAttr('disabled');
        }else{
            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-bottom-right";
            toastr.warning('Mohon isi dulu keywordnya...');
        }

        e.preventDefault();
    });

    $("#btnReset").click(function(){
        $(this).attr('disabled', 'disabled');
        $("#btnSearch").removeAttr('disabled');
        $("#txtSearch").val("").removeAttr('readonly');
    });

    var defLat  = {{ $setting->map_latitude }};
    var defLong = {{ $setting->map_longitude }};

    var map = new GMaps({
        div: '#map',
        lat: defLat,
        lng: defLong,
        zoom: 16,
    });

    map.addStyle({
        styledMapName:"Styled Map",
        styles: mapStyles,
        mapTypeId: "bluestyle"
    });

    map.setStyle("bluestyle");

    GMaps.geolocate({
        success: function(position) {
            defLat  = position.coords.latitude;
            defLong = position.coords.longitude;
            map.setCenter(position.coords.latitude, position.coords.longitude);
        },
        error: function(error) {
            // set to blambangan location
            // map.setCenter(defLat, defLong);
            // alert('Geolocation failed: '+error.message);
            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-bottom-right";
            toastr.error("Some thing is wrong");
        },
        not_supported: function() {
            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-bottom-right";
            toastr.error("Your browser does not support geolocation");
        },
        always: function() {
            var pictureLabel = document.createElement("img");
            pictureLabel.src = base_url+'/'+"assets/zoner/img/property-types/apartment.png";
            map.addMarker({
                title: "Lokasi kamu",
                lat: defLat,
                lng: defLong,
                draggable: true,
                icon: base_url+'/assets/yellowmarker.png',
                dragend: function(e) {
                    var location = {
                        lat: e.latLng.lat(),
                        long: e.latLng.lng()
                    };
                    //console.log(location);
                }
            });
        }
    });

    /*var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        scrollwheel: false,
        center: new google.maps.LatLng(defLat, defLong),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: mapStyles
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            map.setCenter(pos);

            defLat  = position.coords.latitude;
            defLong = position.coords.longitude;

            var pictureLabel = document.createElement("img");
            pictureLabel.src = base_url+'/'+"assets/zoner/img/property-types/apartment.png";
            var marker = new MarkerWithLabel({
                title: "Your Location",
                position: new google.maps.LatLng(defLat, defLong),
                map: map,
                icon: base_url+'/assets/zoner/img/marker.png',
                labelContent: pictureLabel,
                labelAnchor: new google.maps.Point(50, 0),
                labelClass: "marker-style"
            });

        }, function() {
            error('Unknow Error...');
        });
    } else {
        // Browser doesn't support Geolocation
        error('Geo Location is not supported');
    }*/


</script>
@stop
