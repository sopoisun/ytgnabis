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

@section('html_tag_attr') class="page-sub-page page-blog-listing" id="page-top" @stop

@section('content')
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Blog Listing</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="content">
                        <header><h1>{{ isset($seo->postCategory) ? 'Post '.$seo->postCategory->name : 'Blog' }}</h1></header>
                        @if( $data->count() )
                        @foreach( $data as $d )
                        <article class="blog-post">
                            <header><a href="blog-detail.html"><h2>{{ $d->post_title }}</h2></a></header>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>{{ $d->user->name }}</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>{{ $d->created_at->format('d M Y') }}</a>
                                <a href="#" class="link-icon"><i class="fa fa-tag"></i>{{ $d->category->name }}</a>
                            </figure>
                            <p>{{ limit_post($d->isi) }}</p>
                            <a href="blog-detail.html" class="link-arrow">Read More</a>
                        </article><!-- /.blog-post -->
                        @endforeach
                        @else
                        <div class="alert alert-info" role="alert">{!! $no_data !!}</div>
                        @endif

                        <!-- Pagination -->
                        @include('zoner.paginator', ['paginator' => $data])
                        <!-- /.pagination-->

                    </section><!-- /#content -->
                </div><!-- /.col-md-9 -->
                <!-- end Content -->

                <!-- sidebar -->
                <div class="col-md-3 col-sm-3">
                    <section id="sidebar">
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
                        <aside id="search">
                            <header><h3>Search</h3></header>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Keyword">
                                <span class="input-group-btn"><button class="btn btn-default search" type="button"><i class="fa fa-search"></i></button></span>
                            </div><!-- /input-group -->
                        </aside>
                        <aside id="post-archive">
                            <header><h3>Post Archive</h3></header>
                            <ul class="list-links">
                                <li><a href="#">June 2014</a></li>
                                <li><a href="#">May 2014</a></li>
                                <li><a href="#">April 2014</a></li>
                                <li><a href="#">March 2014</a></li>
                                <li><a href="#">January 2014</a></li>
                                <li><a href="#">December 2013</a></li>
                                <li><a href="#">November 2013</a></li>
                                <li><a href="#">August 2013</a></li>
                            </ul>
                        </aside><!-- /#post-archive -->
                        <aside id="categories">
                            <header><h3>Categories</h3></header>
                            <ul class="list-links">
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Apartments</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Do it yourself</a></li>
                                <li><a href="#">Housing</a></li>
                                <li><a href="#">Interior</a></li>
                                <li><a href="#">Trends</a></li>
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
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/icheck.min.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/tmpl.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/draggable-0.1.js"></script>
<script type="text/javascript" src="{{ url('/') }}/assets/zoner/js/jquery.slider.js"></script>
@stop
