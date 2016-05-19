@extends('zoner.layout')

@section('css_assets')
<link rel="stylesheet" href="{{ url('/') }}/assets/zoner/css/magnific-popup.css" type="text/css">
@stop

@section('html_tag_attr') class="page-sub-page page-blog-detail" id="page-top" @stop

@section('content')
<!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Blog Detail</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
                <!-- Content -->
                <div class="col-md-9 col-sm-9">
                    <section id="content">
                        <header><h1>{{ $data->post_title }}</h1></header>
                        <article class="blog-post">
                            <!--<header><a href="blog-detail.html"><h2>{{ $data->post_title }}</h2></a></header>-->
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>{{ $data->user->name }}</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>{{ $data->created_at->format('d M Y') }}</a>
                                <a href="#" class="link-icon"><i class="fa fa-tag"></i>{{ $data->category->name }}</a>
                            </figure>
                            <p>{!! $data->isi !!}</p>
                        </article><!-- /.blog-post-listing -->
                        <section id="about-author">
                            <header><h3>About the Author</h3></header>
                            <div class="post-author">
                                <img src="{{ url('/') }}/assets/zoner/img/member-04.jpg">
                                <div class="wrapper">
                                    <header>Maria Scott</header>
                                    <p>Phasellus metus ipsum, sollicitudin lacinia turpis in, pellentesque pulvinar diam.
                                        Cras ultricies augue sapien, aliquam hendrerit mi suscipit at. Suspendisse vulputate felis eget
                                    </p>
                                </div>
                            </div>
                        </section>
                    </section><!-- /#content -->
                    <section id="comments">
                        <header><h2 class="no-border">Comments</h2></header>
                        <ul class="comments">
                            <li class="comment">
                                <figure>
                                    <div class="image">
                                        <img alt="" src="{{ url('/') }}/assets/zoner/img/client-01.jpg">
                                    </div>
                                </figure>
                                <div class="comment-wrapper">
                                    <div class="name pull-left">Catherine Brown</div>
                                    <span class="date pull-right"><span class="fa fa-calendar"></span>12.05.2014</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum, sem ut sollicitudin consectetur,
                                        augue diam ornare massa, ac vehicula leo turpis eget purus. Nunc pellentesque vestibulum mauris, eget suscipit
                                        mauris imperdiet vel. Nulla et massa metus. Nam porttitor quam eget ante elementum consectetur. Aenean ac nisl
                                        et nulla placerat suscipit eu a mauris. Curabitur quis augue condimentum, varius mi in, ultricies velit.
                                        Suspendisse potenti.
                                    </p>
                                    <a href="#" class="reply"><span class="fa fa-reply"></span>Reply</a>
                                    <hr>
                                </div>
                            </li>
                            <li>
                                <ul class="comments-child">
                                    <li class="comment">
                                        <figure>
                                            <div class="image">
                                                <img alt="" src="{{ url('/') }}/assets/zoner/img/agent-01.jpg">
                                            </div>
                                        </figure>
                                        <div class="comment-wrapper">
                                            <div class="name">John Doe</div>
                                            <span class="date"><span class="fa fa-calendar"></span>24.06.2014</span>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vestibulum, sem ut sollicitudin consectetur,
                                                augue diam ornare massa, ac vehicula leo turpis eget purus. Nunc pellentesque vestibulum mauris, eget suscipit
                                                mauris.
                                            </p>
                                            <a href="#" class="reply"><span class="fa fa-reply"></span>Reply</a>
                                            <hr>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <figure>
                                    <div class="image">
                                        <img alt="" src="{{ url('/') }}/assets/zoner/img/user-02.jpg">
                                    </div>
                                </figure>
                                <div class="comment-wrapper">
                                    <div class="name">John Doe</div>
                                    <span class="date"><span class="fa fa-calendar"></span>08.05.2014</span>
                                    <p>Quisque iaculis neque at dui cursus posuere. Sed tristique pharetra orci, eu malesuada ante tempus nec.
                                        Phasellus enim odio, facilisis et ante vel, tempor congue sapien. Praesent eget ligula
                                        eu libero cursus facilisis vel non arcu. Sed vitae quam enim.
                                    </p>
                                    <a href="#" class="reply"><span class="fa fa-reply"></span>Reply</a>
                                    <hr>
                                </div>
                            </li>
                        </ul>
                    </section><!-- /#comments -->
                    <section id="leave-reply">
                        <header><h2 class="no-border">Leave a Reply</h2></header>
                        <form role="form" id="form-blog-reply" method="post"  class="clearfix">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-blog-reply-name">Your Name<em>*</em></label>
                                        <input type="text" class="form-control" id="form-blog-reply-name" name="form-blog-reply-name" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form-blog-reply-email">Your Email<em>*</em></label>
                                        <input type="email" class="form-control" id="form-blog-reply-email" name="form-blog-reply-email" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form-blog-reply-message">Your Message<em>*</em></label>
                                        <textarea class="form-control" id="form-blog-reply-message" rows="5" name="form-blog-reply-message" required></textarea>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                            <div class="form-group clearfix">
                                <button type="submit" class="btn pull-right btn-default" id="form-blog-reply-submit">Leave a Reply</button>
                            </div><!-- /.form-group -->
                            <div id="form-rating-status"></div>
                        </form><!-- /#form-contact -->
                    </section>
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
                                <li><a href="{{ url($category->seo->permalink) }}">{{ $category->name }}</a></li>
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
