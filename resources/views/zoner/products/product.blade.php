@extends('zoner.layout')

@section('css_assets')
<link rel="stylesheet" href="{{ url('/') }}/assets/zoner/css/magnific-popup.css" type="text/css">
@stop

@section('html_tag_attr') class="page-sub-page page-agency-detail" id="page-top" @stop

@section('content')
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Property Detail</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Property Detail Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="property-detail">
                        <header class="property-title">
                            <h1>{{ $data->name }}</h1>
                            <figure>{{ $data->business }}</figure>
                            <span class="actions">
                                <!--<a href="#" class="fa fa-print"></a>
                                <a href="#" class="bookmark" data-bookmark-state="empty"><span class="title-add">Add to bookmark</span><span class="title-added">Added</span></a>-->
                            </span>
                        </header>
                        <section id="agent-info">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <figure class="agency-image"><img alt="" src="{{ url('/files/products/'.( $data->image_url != NULL ? $data->image_url : 'no-image.png' )) }}"></figure>
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6 col-sm-6">
                                    <h3>Info {{ $data->category }}</h3>
                                    <address>
                                        <a href="#" class="show-on-map" style="z-index:9;"><i class="fa fa-map-marker"></i><figure>Map</figure></a>
                                        <div class="row">
                                            <div class="col-md-11">
                                                <strong>{{ $data->business }}</strong>
                                                <br /><br />
                                                {{ $data->busines }}
                                            </div>
                                        </div>
                                    </address>
                                    <dl>
                                        <dt>Harga:</dt>
                                        <dd>{{ number_format($data->price, 0, ',', '.') }}</dd>
                                        <dt>Dilihat:</dt>
                                        <dd>{{ $data->counter >= 100 ? $data->counter : 150 }} X</dd>
                                        <dt>Rating:</dt>
                                        <dd><div class="rating rating-overall" data-score="4"></div></dd>
                                    </dl>
                                    <div class="clearfix" style="margin-bottom:20px;"></div>
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
                                <div class="col-md-1 col-sm-1"></div><!-- /.col-md-1 -->

                            </div><!-- /.row -->
                            <div class="row">

                            </div><!-- /.row -->
                        </section><!-- /#agent-info -->

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <section id="description">
                                    <header><h2>Deskripsi {{ $data->category }}</h2></header>
                                    <p>{!! $data->about !!}</p>
                                </section><!-- /#description -->
                            </div><!-- /.col-md-8 -->
                            <div class="col-md-12 col-sm-12">
                                <section id="similar-properties">
                                    <header><h2 class="no-border">{{ $data->category }} Serupa</h2></header>
                                    <div class="row">
                                        @foreach($sames as $same)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="property">
                                                <a href="property-detail.html">
                                                    <div class="property-image">
                                                        <img alt="" src="{{ url('/files/products/'.( $same->image_url != NULL ? $same->image_url : 'no-image.png' )) }}">
                                                    </div>
                                                    <div class="overlay">
                                                        <div class="info">
                                                            <div class="tag price">{{ number_format($same->price, 0, ',', '.') }}</div>
                                                            <h3>{{ $same->name }}</h3>
                                                            <figure>{{ $same->business }}</figure>
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
                                </section><!-- /#similar-properties -->
                                <hr class="thick">
                                <section id="comments">
                                    <header><h2 class="no-border">Comments</h2></header>

                                </section>
                            </div><!-- /.col-md-12 -->
                        </div><!-- /.row -->
                    </section><!-- /#property-detail -->
                </div><!-- /.col-md-9 -->
                <!-- end Property Detail Content -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
                        <aside id="search">
                            <header><h3>Cari Produk</h3></header>
                            <div class="input-group">
                                <input type="text" class="form-control" id="txtSearch" placeholder="Masukan Nama Produk">
                                <input type="hidden" id="urlSearch" value="produk" />
                                <span class="input-group-btn"><button class="btn btn-default search" type="button" id="btnSearch"><i class="fa fa-search"></i></button></span>
                            </div><!-- /input-group -->
                        </aside>

                        <aside id="categories">
                            <header><h3>Kategori Produk</h3></header>
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
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/icheck.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.raty.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/tmpl.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/draggable-0.1.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.slider.js"></script>
@stop

@section('js_section')
@include('zoner.search-js')
@stop
