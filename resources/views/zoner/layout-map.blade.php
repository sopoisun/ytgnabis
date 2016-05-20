<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Ahmad Rizal Afani">
    <meta name="description" content="{{ $description or '' }}">
    <meta name="keywords" content="{{ $keywords or '' }}">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="{{ url('assets/zoner') }}/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/zoner') }}/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/zoner') }}/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/zoner') }}/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/zoner') }}/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="{{ url('assets/zoner') }}/css/style.css" type="text/css">

    @yield('css_assets')

    @yield('css_section')

    <title>{{ $site_title or '' }}</title>

</head>

<body @yield('html_tag_attr')>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=611281058922957";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Wrapper -->
<div class="wrapper">

    <div class="navigation">
        <!--<div class="secondary-navigation">
            <div class="container">
                <div class="contact">
                    <figure><strong>Phone:</strong>+1 810-991-3842</figure>
                    <figure><strong>Email:</strong>zoner@example.com</figure>
                </div>
                <div class="user-area">
                    <div class="actions">
                        <a href="create-agency.html" class="promoted">Create Agency</a>
                        <a href="create-account.html" class="promoted"><strong>Register</strong></a>
                        <a href="sign-in.html">Sign In</a>
                    </div>
                    <div class="language-bar">
                        <a href="#" class="active"><img src="{{ url('assets/zoner') }}/img/flags/gb.png" alt=""></a>
                        <a href="#"><img src="{{ url('assets/zoner') }}/img/flags/de.png" alt=""></a>
                        <a href="#"><img src="{{ url('assets/zoner') }}/img/flags/es.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="container">
            <header class="navbar" id="top" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <a href="index-google-map-fullscreen.html"><img src="{{ url('assets/zoner') }}/img/logo.png" alt="brand"></a>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        @foreach($menu as $m)
                        <li class="{{ $m->permalink == $permalink ? 'active' : '' }}"><a href="{{ url($m->permalink) }}">{{ $m->page_title }}</a></li>
                        @endforeach
                    </ul>
                </nav><!-- /.navbar collapse-->
            </header><!-- /.navbar -->
        </div><!-- /.container -->
    </div><!-- /.navigation -->

    @yield('content')

</div>
<script>
    var base_url = "{{ url('/') }}";
</script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/smoothscroll.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/retina-1.1.0.min.js"></script>
@yield('js_assets')
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/custom.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/ie.js"></script>
<![endif]-->
@yield('js_section')
</body>
</html>
