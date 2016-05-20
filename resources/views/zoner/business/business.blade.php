@extends('zoner.layout')

@section('css_assets')
<link rel="stylesheet" href="{{ url('/') }}/assets/zoner/css/magnific-popup.css" type="text/css">
@stop

@section('html_tag_attr') class="page-sub-page page-agency-detail" id="page-top" @stop

@section('content')
<!-- Page Content -->
    <div id="page-content">

        @include('zoner.breadcrumbs')

        <div class="container">
            <div class="row">
                <!-- Agent Detail -->
                <div class="col-md-9 col-sm-9">
                    <section id="agent-detail">
                        <header><h1>{{ $data->name }}</h1></header>
                        <section id="agent-info">
                            <div class="row">
                                <div class="col-md-3 col-sm-3">
                                    <figure class="agent-image"><img alt="" src="{{ url('/files/businesses/'.( $data->image_url != NULL ? $data->image_url : 'no-image.jpg' )) }}"></figure>
                                </div><!-- /.col-md-3 -->
                                <div class="col-md-5 col-sm-5">
                                    <h3>Info Bisnis</h3>
                                    <address>
                                        <a href="#" class="show-on-map" style="z-index:9;"><i class="fa fa-map-marker"></i><figure>Map</figure></a>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <strong>Alamat</strong>
                                                <br /><br />
                                                {{ $data->address }}
                                            </div>
                                        </div>
                                    </address>
                                    <dl>
                                        <dt>Kategori:</dt>
                                        <dd>{{ $data->categories }}</dd>

                                        <dt>Rating:</dt>
                                        <dd>
                                            <div class="rating rating-overall" data-score="4"></div>
                                            <div class="clearfix"></div>
                                        </dd>
                                    </dl>
                                    <div class="clearfix" style="margin-bottom:10px;"></div>
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5">
                                            <!--<a href="" class="btn btn-warning btn-sm">Order Sekarang</a>-->
                                            <h4 style="font-weight:bold;">Rating Dari Anda:</h4>
                                        </div>
                                        <div class="col-md-7 col-xs-7">
                                            <aside class="pull-right">
                                                <div class="rating rating-user">
                                                    <div class="inner"></div>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div><!-- /.col-md-5 -->
                                <div class="col-md-4 col-sm-4">
                                    <h3>Sekilas Tentang Bisnis</h3>
                                    <p>{!! $data->about !!}</p>
                                </div><!-- /.col-md-4 -->
                            </div><!-- /.row -->
                        </section><!-- /#agent-info -->
                        <hr class="thick">
                        <section id="agent-properties">
                            <header><h3>Daftar Produk</h3></header>
                            @if( $products->count() )

                            {{--*/ $dPage = ceil($products->count()/3); /*--}}
                            @for( $i = 0; $i<$dPage; $i++ )
                            {{--*/ $display = $products->forPage(($i+1), 3); /*--}}
                            <div class="row">
                                @foreach($display as $d)
                                <div class="col-md-4 col-sm-4">
                                    <div class="property equal-height">
                                        <!--<figure class="tag status">For Sale</figure>-->
                                        <!--<figure class="type" title="Apartment"><img src="{{ url('/') }}/assets/zoner/img/property-types/apartment.png" alt=""></figure>-->
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

                            @else
                            <div class="alert alert-info" role="alert"><p><b>{{ $data->name }}</b> Tidak memiliki produk.</p></div>
                            @endif
                        </section><!-- /#agent-properties -->
                        <hr class="thick">
                        <section id="comments">
                            <header><h2 class="no-border">Comments</h2></header>

                        </section>
                    </section><!-- /#agent-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Agent Detail -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="search">
                            <header><h3>Cari Bisnis</h3></header>
                            <div class="input-group">
                                <input type="text" class="form-control" id="txtSearch" placeholder="Masukan Nama Bisnis">
                                <input type="hidden" id="urlSearch" value="bisnis" />
                                <span class="input-group-btn"><button class="btn btn-default search" type="button" id="btnSearch"><i class="fa fa-search"></i></button></span>
                            </div><!-- /input-group -->
                        </aside>

                        <aside id="categories">
                            <header><h3>Kategori Bisnis</h3></header>
                            <ul class="list-links">
                                @foreach($categories as $category)
                                <li><a href="{{ url($category->permalink) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside><!-- /#categories -->

                        <aside id="featured-properties">
                            <header><h3>Produk Populer</h3></header>
                            @foreach($productPopular as $p)
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="{{ url('/files/products/'.( $p->image_url != NULL ? $p->image_url : 'no-image.png' )) }}">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="{{ url($p->permalink) }}"><h4>{{ $p->name }}</h4></a>
                                    <figure>{{ $p->business }} </figure>
                                    <div class="tag price">{{ number_format($p->price, 0, ',', '.') }}</div>
                                </div>
                            </div><!-- /.property -->
                            @endforeach
                        </aside><!-- /#featured-properties -->

                    </section><!-- /#sidebar -->
                </div><!-- /.col-md-3 -->
                <!-- end Sidebar -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
@stop

@section('js_assets')
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/icheck.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.raty.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/tmpl.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/draggable-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.slider.js"></script>
@stop

@section('js_section')
@include('zoner.search-js')
@stop
