@extends('zoner.layout')

@section('css_assets')
<link rel="stylesheet" href="{{ url('/') }}/assets/zoner/css/magnific-popup.css" type="text/css">
@stop

@section('css_section')
<style>
.alert{
    -moz-border-radius: 0;
    -webkit-border-radius: 0;
    -o-border-radius: 0;
    border-radius: 0;
}
</style>
@stop

@section('html_tag_attr') class="page-sub-page page-listing-lines page-search-results" id="page-top" @stop

@section('content')
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Property Listing</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Results -->
                <div class="col-md-9 col-sm-9">
                    <section id="results">
                        <header><h1>Daftar {{ isset($seo->productCategory) ? $seo->productCategory->name : 'Produk' }}</h1></header>
                        @if( $data->count() )
                        <section id="search-filter">
                            <figure><h3><i class="fa fa-search"></i>Search Results:</h3>
                                <span class="search-count">Page {{ $data->currentPage() }} / {{ $data->lastPage() }}</span>
                                <div class="sorting">
                                    <div class="form-group">
                                        <select name="sorting" class="fc">
                                            <option value="">Sort By</option>
                                            <option value="1">Lowest price first</option>
                                            <option value="2">Highest price first</option>
                                            <option value="3">Date added</option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                            </figure>
                        </section>
                        <section id="properties" class="display-lines">
                            @foreach($data as $d)
                            <div class="property">
                                <!--<figure class="tag status">For Sale</figure>-->
                                <!--<figure class="type" title="Apartment"><img src="{{ url('/') }}/assets/zoner/img/property-types/apartment.png" alt=""></figure>-->
                                <div class="property-image">
                                    <!--<figure class="ribbon">In Hold</figure>-->
                                    <a href="property-detail.html">
                                        <img alt="" src="{{ url('/') }}/assets/zoner/img/properties/property-01.jpg">
                                    </a>
                                </div>
                                <div class="info">
                                    <header>
                                        <a href="property-detail.html"><h3>{{ $d->name }}</h3></a>
                                        <figure>{{ $d->business->name }}</figure>
                                    </header>
                                    <div class="tag price">Rp. {{ number_format($d->price, 0, ',', '.') }}</div>
                                    <div style="margin:10px 0px 30px;">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras et dui vestibulum,
                                            bibendum purus sit amet, vulputate mauris. Ut adipiscing gravida tincidunt...
                                        </p>
                                    </div>
                                    <a href="property-detail.html" class="link-arrow">Read More</a>
                                </div>
                            </div><!-- /.property -->
                            @endforeach
                            <!-- Pagination -->
                            @include('zoner.paginator', ['paginator' => $data])
                            <!-- /.pagination-->
                        </section><!-- /#properties-->
                        @else
                        <div class="alert alert-info" role="alert">{!! $no_data !!}</div>
                        @endif
                    </section><!-- /#results -->
                </div><!-- /.col-md-9 -->
                <!-- end Results -->

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
                                        <img alt="" src="{{ url('/') }}/assets/zoner/img/properties/property-06.jpg">
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
                                        <img alt="" src="{{ url('/') }}/assets/zoner/img/properties/property-09.jpg">
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
                                        <img alt="" src="{{ url('/') }}/assets/zoner/img/properties/property-03.jpg">
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
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/icheck.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/tmpl.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/draggable-0.1.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.slider.js"></script>
@stop
