@extends('zoner.layout')

@section('html_tag_attr') class="page-homepage navigation-fixed-top map-google" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90" @stop

@section('content')
<div class="container">
    <div class="geo-location-wrapper">
        <span class="btn geo-location"><i class="fa fa-map-marker"></i><span class="text">Find My Position</span></span>
    </div>
</div>

<!-- Map -->
<div id="map" class="has-parallax"></div>
<!-- end Map -->

<!-- Search Box -->
@include('zoner.map.search-box')
<!-- end Search Box -->

<!-- Page Content -->
<div id="page-content">

    <section id="banner">
        <div class="block has-dark-background background-color-default-darker center text-banner">
            <div class="container">
                <h1 class="no-bottom-margin no-border">Kami akan bantu anda menemukan produk / jasa di kota kami</h1>
            </div>
        </div>
    </section><!-- /#banner -->

    <section id="testimonials" class="block">
        <div class="container">
            <header class="section-title"><h2>Quotes</h2></header>

            <blockquote class="testimonial">
                <aside class="cite">
                    <p>Apa beda kami dengan google map ? Kami pencarian produk / jasa nya, bukan cuma lokasinya.</p>
                    <footer>Rizal Afani</footer>
                </aside>
            </blockquote>
        </div><!-- /.container -->
    </section><!-- /#testimonials -->

    <section id="new-properties" class="block">
        <div class="container">
            <header class="section-title">
                <h2>Produk Populer</h2>
                <a href="{{ url('/product') }}" class="link-arrow">Semua Produk</a>
            </header>
            {{--*/ $dPage = ceil($productPopular->count()/4); /*--}}
            @for( $i = 0; $i<$dPage; $i++ )
            {{--*/ $display = $productPopular->forPage(($i+1), 4); /*--}}
            <div class="row">
                @foreach($display as $d)
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="{{ url($d->permalink) }}">
                            <div class="property-image">
                                <img alt="" src="{{ url('/files/products/'.( $d->image_url != NULL ? $d->image_url : 'no-image.png' )) }}">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">Rp. {{ number_format($d->price, 0, ',', '.') }}</div>
                                    <h3>{{ $d->name }}</h3>
                                    <figure>{{ $d->business }}</figure>
                                </div>

                                <ul class="additional-info">
                                    <li>
                                        <header>Area:</header>
                                        <figure>240m<sup>2</sup></figure>
                                    </li>
                                    <li>
                                        <header>Beds:</header>
                                        <figure>2</figure>
                                    </li>
                                    <li>
                                        <header>Baths:</header>
                                        <figure>2</figure>
                                    </li>
                                    <li>
                                        <header>Garages:</header>
                                        <figure>0</figure>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div><!-- /.property -->
                </div><!-- /.col-md-3 -->
                @endforeach
            </div><!-- /.row-->
            @endfor
        </div><!-- /.container-->
    </section><!-- /#new-properties-->

    <section id="partners" class="block">
        <div class="container">
            <header class="section-title"><h2>Mitra Kami</h2></header>
            <div class="logos">
                @foreach($businessPopular as $d)
                <div class="logo"><a href=""><img src="{{ url('/files/businesses/'.( $d->image_url != NULL ? $d->image_url : 'no-image.jpg' )) }}" alt=""></a></div>
                @endforeach
            </div>
        </div><!-- /.container -->
    </section><!-- /#partners -->
</div>
<!-- end Page Content -->
@stop

@section('js_assets')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAnGBfzMEan-bf6oEWoL6j_YmWH0wnzifA"></script>
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

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 16,
        scrollwheel: false,
        center: new google.maps.LatLng(defLat, defLong),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: mapStyles
    });

    TryGeoLocation();

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

    $("#form-map").submit(function(e){
        if( $("#txtSearch").val() != "" ){
            $("#txtSearch").attr('readonly', 'readonly');
            $("#btnSearch").attr('disabled', 'disabled');
            $("#btnReset").removeAttr('disabled');

            var url = "{{ url('/map') }}?q="+$("#txtSearch").val()+"&lat="+map.getCenter().lat()+"&lng="+map.getCenter().lng();
            //console.log(url);
            window.location = url;
        }else{
            toastr.options.closeButton = true;
            toastr.options.positionClass = "toast-bottom-right";
            toastr.warning('Mohon isi dulu keywordnya...');
        }

        e.preventDefault();
    });
</script>
@stop
