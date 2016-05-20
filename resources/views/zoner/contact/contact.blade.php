@extends('zoner.layout')

@section('css_assets')
<link rel="stylesheet" href="{{ url('/') }}/assets/zoner/css/magnific-popup.css" type="text/css">
@stop

@section('html_tag_attr') class="page-sub-page page-contact" id="page-top" @stop

@section('content')
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Contact</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Contact -->
                <div class="col-md-9 col-sm-9">
                    <section id="agent-detail">
                        <header><h1>Contact Us</h1></header>
                        <section id="contact-information">
                            <div class="row">
                                <div class="col-md-4 col-sm-5">
                                    <section id="address">
                                        <header><h3>Address</h3></header>
                                        <address>
                                            <strong>{{ $setting->business_name }}</strong><br>
                                            {!! $setting->alamat !!}
                                        </address>
                                        {{ $setting->phone }}<br>
                                        <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a><br>
                                    </section><!-- /#address -->
                                    <section id="social">
                                        <header><h3>Social Profiles</h3></header>
                                        <div class="agent-social">
                                            <a href="{{ $setting->facebook }}" class="fa fa-twitter btn btn-grey-dark"></a>
                                            <a href="{{ $setting->twitter }}" class="fa fa-facebook btn btn-grey-dark"></a>
                                            <a href="{{ $setting->instagram }}" class="fa fa-instagram btn btn-grey-dark"></a>
                                        </div>
                                    </section><!-- /#social -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-8 col-sm-7">
                                    <header><h3>Lokasi Kantor Kami</h3></header>
                                    <div id="contact-map"></div>
                                </div><!-- /.col-md-8 -->
                            </div><!-- /.row -->
                        </section><!-- /#agent-info -->
                        <hr class="thick">
                        <section id="form">
                            <header><h3>Kirimi kami pesan</h3></header>
                            <form role="form" id="form-contact" method="post" action="mailto:{{ $setting->email }}"  class="clearfix">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form-contact-name">Nama Anda<em>*</em></label>
                                            <input type="text" class="form-control" id="form-contact-name" name="form-contact-name" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form-contact-email">Email Anda<em>*</em></label>
                                            <input type="email" class="form-control" id="form-contact-email" name="form-contact-email" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-6 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form-contact-message">Isi Pesan<em>*</em></label>
                                            <textarea class="form-control" id="form-contact-message" rows="8" name="form-contact-message" required></textarea>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                                <div class="form-group clearfix">
                                    <button type="submit" class="btn pull-right btn-default" id="form-contact-submit">Send a Message</button>
                                </div><!-- /.form-group -->
                                <div id="form-status"></div>
                            </form><!-- /#form-contact -->
                        </section>
                    </section><!-- /#agent-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Contact -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="categories">
                            <header><h3>Kategori Produk</h3></header>
                            <ul class="list-links">
                                @foreach($productCategories as $category)
                                <li><a href="{{ url($category->permalink) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside><!-- /#categories -->

                        <aside id="categories">
                            <header><h3>Kategori Bisnis</h3></header>
                            <ul class="list-links">
                                @foreach($businessCategories as $category)
                                <li><a href="{{ url($category->permalink) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside><!-- /#categories -->

                        <aside id="categories">
                            <header><h3>Kategori Post</h3></header>
                            <ul class="list-links">
                                @foreach($postCategories as $category)
                                <li><a href="{{ url($category->permalink) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside><!-- /#categories -->
                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
@stop

@section('js_assets')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/markerwithlabel_packed.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/infobox.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/tmpl.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/draggable-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.slider.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/custom-map.js"></script>
@stop

@section('js_section')
<script>
    _latitude   = {{ $setting->map_latitude }};
    _longitude  = {{ $setting->map_longitude }};
    google.maps.event.addDomListener(window, 'load', contactUsMap(_latitude,_longitude));
</script>
@stop
