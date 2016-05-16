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
                        <header><h1>Article Detail</h1></header>
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
                            <h3>Parahraph Headline</h3>
                            <p>
                                Phasellus metus ipsum, sollicitudin lacinia turpis in, pellentesque pulvinar diam.
                                Cras ultricies augue sapien, aliquam hendrerit mi suscipit at. Suspendisse vulputate felis eget
                                felis convallis fermentum et eu nulla. Donec sagittis sit amet erat non eleifend. Mauris at convallis
                                magna. Quisque pellentesque id mauris vitae placerat. Mauris facilisis odio nec metus cursus commodo.
                                Integer vel libero nunc. Donec ac lorem commodo, laoreet elit eget, tempus ante. Quisque eu nunc blandit
                                erat rutrum feugiat ac sed arcu. In nisi risus, molestie a sem adipiscing, porta volutpat velit.
                                Pellentesque nec felis sit amet nunc porta tincidunt sit amet et justo.
                            </p>
                            <h3>Audio Object</h3>
                            <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/71654970&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_artwork=true&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
                            <h3>Parahraph Headline</h3>
                            <p>
                                Phasellus metus ipsum, sollicitudin lacinia turpis in, pellentesque pulvinar diam.
                                Cras ultricies augue sapien, aliquam hendrerit mi suscipit at. Suspendisse vulputate felis eget
                                felis convallis fermentum et eu nulla. Donec sagittis sit amet erat non eleifend. Mauris at convallis
                                magna. Quisque pellentesque id mauris vitae placerat.
                            </p>
                            <h4>List Headline</h4>
                            <ul>
                                <li>Phasellus metus ipsum, sollicitudin</li>
                                <li>Quisque pellentesque id mauris</li>
                                <li>Donec ac lorem commodo</li>
                                <li>In nisi risus, molestie a sem adipiscing</li>
                                <li>Pellentesque nec felis sit amet nunc</li>
                            </ul>
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
