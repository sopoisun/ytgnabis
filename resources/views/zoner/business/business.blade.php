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
                                    <figure class="agent-image"><img alt="" src="{{ url('assets/zoner') }}/img/agent-01.jpg"></figure>
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
                                        <dd>{{ implode(', ', $data->categories->lists('name')->toArray()) }}</dd>

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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum,
                                        bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt.
                                        Duis euismod placerat rhoncus. Phasellus mollis imperdiet placerat.
                                    </p>
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
                        <aside id="edit-search">
                            <header><h3>Search Properties</h3></header>
                            <form role="form" id="form-sidebar" class="form-search" action="properties-listing.html">
                                <div class="form-group">
                                    <select name="type" class="fc">
                                        <option value="">Status</option>
                                        <option value="1">Rent</option>
                                        <option value="2">Sale</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="country" class="fc">
                                        <option value="">Country</option>
                                        <option value="1">France</option>
                                        <option value="2">Great Britain</option>
                                        <option value="3">Spain</option>
                                        <option value="4">Russia</option>
                                        <option value="5">United States</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="city" class="fc">
                                        <option value="">City</option>
                                        <option value="1">New York</option>
                                        <option value="2">Los Angeles</option>
                                        <option value="3">Chicago</option>
                                        <option value="4">Houston</option>
                                        <option value="5">Philadelphia</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="district" class="fc">
                                        <option value="">District</option>
                                        <option value="1">Manhattan</option>
                                        <option value="2">The Bronx</option>
                                        <option value="3">Brooklyn</option>
                                        <option value="4">Queens</option>
                                        <option value="5">Staten Island</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <select name="property-type" class="fc">
                                        <option value="">Property Type</option>
                                        <option value="1">Apartment</option>
                                        <option value="2">Condominium</option>
                                        <option value="3">Cottage</option>
                                        <option value="4">Flat</option>
                                        <option value="5">House</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <div class="price-range">
                                        <input id="price-input" type="text" name="price" value="1000;299000">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Search Now</button>
                                </div><!-- /.form-group -->
                            </form><!-- /#form-map -->
                        </aside><!-- /#edit-search -->
                        <aside id="featured-properties">
                            <header><h3>Featured Properties</h3></header>
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-06.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>2186 Rinehart Road</h4></a>
                                    <figure>Doral, FL 33178 </figure>
                                    <div class="tag price">$ 72,000</div>
                                </div>
                            </div><!-- /.property -->
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-09.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>2479 Murphy Court</h4></a>
                                    <figure>Minneapolis, MN 55402</figure>
                                    <div class="tag price">$ 36,000</div>
                                </div>
                            </div><!-- /.property -->
                            <div class="property small">
                                <a href="property-detail.html">
                                    <div class="property-image">
                                        <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-03.jpg">
                                    </div>
                                </a>
                                <div class="info">
                                    <a href="property-detail.html"><h4>1949 Tennessee Avenue</h4></a>
                                    <figure>Minneapolis, MN 55402</figure>
                                    <div class="tag price">$ 128,600</div>
                                </div>
                            </div><!-- /.property -->
                        </aside><!-- /#featured-properties -->
                        <aside id="our-guides">
                            <header><h3>Our Guides</h3></header>
                            <a href="#" class="universal-button">
                                <figure class="fa fa-home"></figure>
                                <span>Buying Guide</span>
                                <span class="arrow fa fa-angle-right"></span>
                            </a><!-- /.universal-button -->
                            <a href="#" class="universal-button">
                                <figure class="fa fa-umbrella"></figure>
                                <span>Right Insurance for You</span>
                                <span class="arrow fa fa-angle-right"></span>
                            </a><!-- /.universal-button -->
                        </aside><!-- /#our-guide -->
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
