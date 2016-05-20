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

        @include('zoner.breadcrumbs')

        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="content">
                        <header><h1>{{ isset($seo['post']) ? 'Post '.$seo['post']->name : (isset($archive) ? 'Post '.$archive->format('M Y') : 'Blog') }}</h1></header>
                        @if( $data->count() )
                        @foreach( $data as $d )
                        <article class="blog-post">
                            <header><a href="{{ url($d->permalink) }}"><h2>{{ $d->post_title }}</h2></a></header>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>{{ $d->user_name }}</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>{{ $d->created_at->format('d M Y') }}</a>
                                <a href="#" class="link-icon"><i class="fa fa-tag"></i>{{ $d->category }}</a>
                            </figure>
                            <p>{{ limit_post($d->isi) }}</p>
                            <a href="{{ url($d->permalink) }}" class="link-arrow">Read More</a>
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
                        <aside id="search">
                            <header><h3>Cari Post</h3></header>
                            <div class="input-group">
                                <input type="text" class="form-control" id="txtSearch" placeholder="Masukan Judul Post">
                                <input type="hidden" id="urlSearch" value="blog" />
                                <span class="input-group-btn"><button class="btn btn-default search" type="button" id="btnSearch"><i class="fa fa-search"></i></button></span>
                            </div><!-- /input-group -->
                        </aside>

                        <aside id="categories">
                            <header><h3>Kategori Post</h3></header>
                            <ul class="list-links">
                                @foreach($categories as $category)
                                <li><a href="{{ url($category->permalink) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </aside><!-- /#categories -->

                        <aside id="post-archive">
                            <header><h3>Post Archive</h3></header>
                            <ul class="list-links">
                                @foreach($archives as $archive)
                                <li>
                                    <a href="{{ url('/archive?bulan='.$archive->tanggal) }}">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m', $archive->tanggal)->format('M Y') }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside><!-- /#post-archive -->
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
@include('zoner.search-js')
@stop
