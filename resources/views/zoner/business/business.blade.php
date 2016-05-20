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
                <li><a href="#">Agents</a></li>
                <li class="active">Agent Detail</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

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
                            <div class="layout-expandable">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-09.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 11,000</div>
                                                        <h3>3398 Lodgeville Road</h3>
                                                        <figure>Golden Valley, MN 55427</figure>
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
                                    </div><!-- /.col-md-4 -->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-03.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 38,000</div>
                                                        <h3>2186 Rinehart Road</h3>
                                                        <figure>Doral, FL 33178 </figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>240m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-4 -->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-06.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 325,000</div>
                                                        <h3>3705 Brighton Circle Road</h3>
                                                        <figure>Glenwood, MN 56334</figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>240m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row-->
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-02.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 18,000</div>
                                                        <h3>2506 B Street</h3>
                                                        <figure>New Brighton, MN 55112</figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>280m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>2</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-4 -->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-12.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 136,000</div>
                                                        <h3>3990 Late Avenue</h3>
                                                        <figure>Kingfisher, OK 73750</figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>30m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>0</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-4 -->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-05.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 12,680</div>
                                                        <h3>297 Marie Street</h3>
                                                        <figure>Towson, MD 21204 </figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>240m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-4 -->
                                </div><!-- /.row-->
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-13.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 13,000</div>
                                                        <h3>2663 West Side Avenue</h3>
                                                        <figure>Fort Lee, NJ 07024</figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>280m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>2</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-04.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 189,000</div>
                                                        <h3>1821 Pursglove Court</h3>
                                                        <figure>Dayton, OH 45429 </figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>30m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
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
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-07.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 45,730</div>
                                                        <h3>1380 Sundown Lane</h3>
                                                        <figure>Austin, TX 78748</figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>240m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-3 -->
                                </div><!-- /.row-->
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-08.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 38,000</div>
                                                        <h3>4862 Palmer Road</h3>
                                                        <figure>Worthington, OH 43085</figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>280m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>2</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-3 -->
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-11.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 103,000</div>
                                                        <h3>1453 Calvin Street</h3>
                                                        <figure>Bel Air, MD 21014</figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>30m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
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
                                    <div class="col-md-4 col-sm-4">
                                        <div class="property">
                                            <a href="property-detail.html">
                                                <div class="property-image">
                                                    <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-10.jpg">
                                                </div>
                                                <div class="overlay">
                                                    <div class="info">
                                                        <div class="tag price">$ 9,380</div>
                                                        <h3>2323 Park Street</h3>
                                                        <figure>Martinez, CA 94553 </figure>
                                                    </div>
                                                    <ul class="additional-info">
                                                        <li>
                                                            <header>Area:</header>
                                                            <figure>240m<sup>2</sup></figure>
                                                        </li>
                                                        <li>
                                                            <header>Beds:</header>
                                                            <figure>3</figure>
                                                        </li>
                                                        <li>
                                                            <header>Baths:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                        <li>
                                                            <header>Garages:</header>
                                                            <figure>1</figure>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div><!-- /.property -->
                                    </div><!-- /.col-md-3 -->
                                </div><!-- /.row-->
                            </div>
                            <div class="center">
                                <span class="show-all">Show All Properties</span>
                            </div>
                        </section><!-- /#agent-properties -->

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
