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

@section('html_tag_attr') class="page-sub-page page-listing page-grid page-search-results" id="page-top" @stop

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
                        <header><h1>Daftar {{ isset($seo['product']) ? $seo['product']->name : 'Produk' }}</h1></header>
                        @if( $data->count() )
                        <section id="search-filter">
                            <figure><h3><i class="fa fa-search"></i>Search Results:</h3>
                                <span class="search-count">Page {{ $data->currentPage() }} / {{ $data->lastPage() }}</span>
                                <div class="sorting">
                                    <div class="form-group">
                                        <select name="sorting" class="fc" id="sortby">
                                            @foreach($orderBys as $key => $val)
                                            {{--*/
                                                $txt = "";
                                                if(isset($params['sort']) && $params['sort'] == $key){
                                                    $txt = 'selected="selected"';
                                                }
                                            /*--}}
                                            <option value="{{ $key }}" {!! $txt !!}>{{ $val['text'] }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                            </figure>
                        </section>
                        <section id="properties">
                        {{--*/ $dPage = ceil($data->count()/3); /*--}}
                        @for( $i = 0; $i<$dPage; $i++ )
                        {{--*/ $display = $data->forPage(($i+1), 3); /*--}}
                        <div class="row">
                            @foreach($display as $d)
                            <div class="col-md-4 col-sm-4">
                                <div class="property equal-height">
                                    <!--<figure class="tag status">For Sale</figure>-->
                                    <!--<figure class="type" title="Apartment"><img src="{{ url('/') }}/assets/zoner/img/property-types/apartment.png" alt=""></figure>-->
                                    <a href="{{ url($d->seo->permalink) }}">
                                        <div class="property-image">
                                            <img alt="" src="{{ url('/') }}/assets/zoner/img/properties/property-09.jpg">
                                        </div>
                                        <div class="overlay">
                                            <div class="info">
                                                <div class="tag price">Rp. {{ number_format($d->price, 0, ',', '.') }}</div>
                                                <h3>{{ $d->name }}</h3>
                                                <figure>{{ $d->business->name }}</figure>
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
                                <li><a href="{{ url($category->seo->permalink) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside><!-- /#categories -->

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

@section('js_section')
@include('zoner.products.products-js')
@include('zoner.search-js')
@stop
