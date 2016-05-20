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

@section('html_tag_attr') class="page-sub-page page-agents-listing" id="page-top" @stop

@section('content')
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Agents</a></li>
                <li class="active">Agents Listing</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Agent Detail -->
                <div class="col-md-9 col-sm-9">
                    <section id="agents-listing">
                        <header><h1>Daftar {{ isset($seo['business']) ? $seo['business']->name : 'Bisnis' }}</h1></header>
                        @if( $data->count() )
                        <div class="row">
                            @foreach($data as $d)
                            <div class="col-md-12 col-lg-6">
                                <div class="agent">
                                    <a href="{{ url($d->permalink) }}" class="agent-image"><img alt="" src="{{ url('/files/businesses/'.( $d->image_url != NULL ? $d->image_url : 'no-image.jpg' )) }}"></a>
                                    <div class="wrapper">
                                        <header><a href="{{ url($d->permalink) }}"><h2>{{ $d->name }}</h2></a></header>
                                        <aside>{{ $d->categories }}</aside>
                                        <dl>
                                            <dt>Alamat:</dt>
                                            <dd>{{ str_limit($d->address, 50) }}</dd>

                                            <dt>Kategori:</dt>
                                            <dd>{{ $d->categories }}</dd>

                                            <dt>Rating:</dt>
                                            <dd>
                                                <div class="rating rating-overall" data-score="4"></div>
                                                <div class="clearfix"></div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div><!-- /.agent -->
                            </div><!-- /.col-md-12 -->
                            @endforeach
                        </div><!-- /.row -->
                        @else
                        <div class="alert alert-info" role="alert">{!! $no_data !!}</div>
                        @endif
                    </section><!-- /#agents-listing -->
                    <!-- Pagination -->
                    @include('zoner.paginator', ['paginator' => $data])
                    <!-- /.pagination-->
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
