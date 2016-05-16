@extends('zoner.layout')

@section('css_assets')
<link rel="stylesheet" href="{{ url('/') }}/assets/zoner/css/magnific-popup.css" type="text/css">
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
                        <header><h1>Blog Listing</h1></header>
                        <article class="blog-post">
                            <a href="blog-detail.html"><img src="{{ url('/') }}/assets/zoner/img/properties/property-detail-02.jpg"></a>
                            <header><a href="blog-detail.html"><h2>Vivamus porta orci eu turpis vulputate ornare fusce hendrerit arcu risu</h2></a></header>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>06/04/2014</a>
                                <div class="tags">
                                    <a href="#" class="tag article">Architecture</a>
                                    <a href="#" class="tag article">Design</a>
                                    <a href="#" class="tag article">Trend</a>
                                </div>
                            </figure>
                            <p>Fusce quis nulla volutpat, rhoncus ligula ut, pulvinar nisi. In dapibus urna sit amet accumsan
                                tristique. Donec odio ligula, luctus venenatis varius id, tincidunt ac ipsum. Cras commodo,
                                velit nec aliquam dictum, tortor velit dictum ipsum, sed ornare nunc leo nec ipsum. Vestibulum
                                sagittis sapien vitae tristique mollis. Aliquam hendrerit nulla semper, viverra mi et,
                                hendrerit mauris. Maecenas hendrerit congue ultrices. In laoreet erat blandit eros aliquet,
                                in malesuada sem rutrum. In placerat porta egestas.
                            </p>
                            <a href="blog-detail.html" class="link-arrow">Read More</a>
                        </article><!-- /.blog-post -->
                        <article class="blog-post">
                            <header><a href="blog-detail.html"><h2>Nulla sapien leo, placerat sed lacinia nec, rutrum quis</h2></a></header>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>06/04/2014</a>
                                <div class="tags">
                                    <a href="#" class="tag article">Interior</a>
                                    <a href="#" class="tag article">New Living</a>
                                </div>
                            </figure>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                Donec rutrum imperdiet ligula in bibendum. Aenean vulputate rutrum lobortis. Nullam non
                                mi ac dui egestas venenatis. Etiam venenatis fermentum accumsan. Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit. Donec at lacus sapien.
                            </p>
                            <a href="blog-detail.html" class="link-arrow">Read More</a>
                        </article><!-- /.blog-post -->
                        <article class="blog-post">
                            <header><a href="blog-detail.html"><h2>SoundCloud Audio Post</h2></a></header>
                            <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/71654970&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>06/04/2014</a>
                                <div class="tags">
                                    <a href="#" class="tag article">Audio</a>
                                    <a href="#" class="tag article">SoundCloud</a>
                                </div>
                            </figure>
                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                                Donec rutrum imperdiet ligula in bibendum. Aenean vulputate rutrum lobortis. Nullam non
                                mi ac dui egestas venenatis. Etiam venenatis fermentum accumsan. Lorem ipsum dolor
                                sit amet, consectetur adipiscing elit. Donec at lacus sapien.
                            </p>
                            <a href="blog-detail.html" class="link-arrow">Read More</a>
                        </article><!-- /.blog-post -->
                        <article class="blog-post">
                            <header><a href="blog-detail.html"><h2>Cras commodo, velit nec aliquam dictum, tortor velit
                                dictum ipsum, sed ornare nunc leo nec ipsum. Vestibulum sagittis sapien vitae tristique mollis.</h2></a></header>
                            <figure class="meta">
                                <a href="#" class="link-icon"><i class="fa fa-user"></i>Admin</a>
                                <a href="#" class="link-icon"><i class="fa fa-calendar"></i>06/04/2014</a>
                                <div class="tags">
                                    <a href="#" class="tag article">Interior</a>
                                    <a href="#" class="tag article">New Living</a>
                                </div>
                            </figure>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sit amet commodo mauris,
                                sit amet commodo turpis. Duis consequat placerat lacus, in sagittis metus pretium vel.
                                In luctus justo venenatis, accumsan justo sit amet, volutpat dolor. Pellentesque quis nulla
                                nec nisi tempor scelerisque. Nam nec scelerisque sapien. Donec eleifend purus id neque pretium,
                                at sollicitudin erat vestibulum. Donec ac tempus tellus, ac dignissim sapien. Fusce et
                                elementum arcu. Maecenas sit amet tincidunt lorem.
                            </p>
                            <p>Vivamus porta orci eu turpis vulputate ornare. Fusce hendrerit arcu risus, sed commodo
                                lacus viverra in. Donec eget ligula in risus rutrum pretium id a elit. Nullam ut tristique
                                arcu. Nam quis nunc ac eros accumsan tincidunt vel sit amet lorem. Sed euismod, turpis
                                et facilisis vestibulum, leo lectus consectetur velit, sed lobortis ante dolor nec leo.
                                Praesent congue tellus eu dui consectetur commodo. Sed quam ante, elementum sodales felis
                                quis, rutrum tincidunt dolor. Etiam nec metus iaculis arcu cursus pulvinar. Nunc interdum
                                eros a neque elementum lobortis. Nulla mattis quis risus vel molestie. Mauris id urna ac
                                metus blandit lobortis in et odio.
                            </p>
                            <a href="blog-detail.html" class="link-arrow">Read More</a>
                        </article><!-- /.blog-post -->

                        <!-- Pagination -->
                        <div class="center">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                            </ul><!-- /.pagination-->
                        </div><!-- /.center-->
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
