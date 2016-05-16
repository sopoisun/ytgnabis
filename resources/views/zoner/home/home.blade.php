@extends('zoner.layout')

@section('html_tag_attr') class="page-homepage navigation-fixed-top map-google" id="page-top" data-spy="scroll" data-target=".navigation" data-offset="90" @stop

@section('content')
<div class="container">
    <div class="geo-location-wrapper">
        <span class="btn geo-location"><i class="fa fa-map-marker"></i><span class="text">Find My Position</span></span>
    </div>
</div>

<!-- Map -->
<div id="map" class="has-parallax"></div>
<!-- end Map -->

<!-- Search Box -->
<div class="search-box-wrapper">
    <div class="search-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="search-box map">
                        <form role="form" id="form-map" class="form-map form-search">
                            <h2>Search Your Property</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" id="search-box-property-id" placeholder="Property ID">
                            </div>
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
                    </div><!-- /.search-box.map -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.search-box-inner -->
</div>
<!-- end Search Box -->

<!-- Page Content -->
<div id="page-content">
    <section id="banner">
        <div class="block has-dark-background background-color-default-darker center text-banner">
            <div class="container">
                <h1 class="no-bottom-margin no-border">Zoner Is Fully Loaded Real Estate Template with <a href="#" class="text-underline">Tons of Features</a>!</h1>
            </div>
        </div>
    </section><!-- /#banner -->
    <section id="our-services" class="block">
        <div class="container">
            <header class="section-title"><h2>Our Services</h2></header>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-folder"></i></figure>
                        <aside class="description">
                            <header><h3>Wide Range of Properties</h3></header>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                            <a href="properties-listing.html" class="link-arrow">Read More</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-users"></i></figure>
                        <aside class="description">
                            <header><h3>14 Agents for Your Service</h3></header>
                            <p>Aliquam gravida magna et fringilla convallis. Pellentesque habitant morbi </p>
                            <a href="agents-listing.html" class="link-arrow">Read More</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4 col-sm-4">
                    <div class="feature-box equal-height">
                        <figure class="icon"><i class="fa fa-money"></i></figure>
                        <aside class="description">
                            <header><h3>Best Price Guarantee!</h3></header>
                            <p>Phasellus non viverra tortor, id auctor leo. Suspendisse id nibh placerat</p>
                            <a href="#" class="link-arrow">Read More</a>
                        </aside>
                    </div><!-- /.feature-box -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /#our-services -->
    <section id="price-drop" class="block">
        <div class="container">
            <header class="section-title">
                <h2>Price Drop</h2>
                <a href="properties-listing.html" class="link-arrow">All Properties</a>
            </header>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-06.jpg">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-04.jpg">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-07.jpg">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-08.jpg">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">$ 16,000</div>
                                    <h3>362 Lynn Ogden Lane</h3>
                                    <figure>Galveston, TX 77550</figure>
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
        </div><!-- /.container -->
    </section><!-- /#price-drop -->
    <aside id="advertising" class="block">
        <div class="container">
            <a href="submit.html">
                <div class="banner">
                    <div class="wrapper">
                        <span class="title">Do you want your property to be listed here?</span>
                        <span class="submit">Submit it now! <i class="fa fa-plus-square"></i></span>
                    </div>
                </div><!-- /.banner-->
            </a>
        </div>
    </aside><!-- /#adveritsing-->
    <section id="new-properties" class="block">
        <div class="container">
            <header class="section-title">
                <h2>New Properties for You</h2>
                <a href="properties-listing.html" class="link-arrow">All Properties</a>
            </header>
            <div class="row">
                <div class="col-md-3 col-sm-6">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-01.jpg">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">$ 16,000</div>
                                    <h3>362 Lynn Ogden Lane</h3>
                                    <figure>Galveston, TX 77550</figure>
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
                <div class="col-md-3 col-sm-6">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
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
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="property">
                        <a href="property-detail.html">
                            <div class="property-image">
                                <img alt="" src="{{ url('assets/zoner') }}/img/properties/property-10.jpg">
                            </div>
                            <div class="overlay">
                                <div class="info">
                                    <div class="tag price">$ 12,800</div>
                                    <h3>64 Timberbrook Lane</h3>
                                    <figure>Denver, CO 80202</figure>
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
        </div><!-- /.container-->
    </section><!-- /#new-properties-->
    <section id="testimonials" class="block">
        <div class="container">
            <header class="section-title"><h2>Testimonials</h2></header>
            <div class="owl-carousel testimonials-carousel">
                <blockquote class="testimonial">
                    <figure>
                        <div class="image">
                            <img alt="" src="{{ url('assets/zoner') }}/img/client-01.jpg">
                        </div>
                    </figure>
                    <aside class="cite">
                        <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                        <footer>Natalie Jenkins</footer>
                    </aside>
                </blockquote>
                <blockquote class="testimonial">
                    <figure>
                        <div class="image">
                            <img alt="" src="{{ url('assets/zoner') }}/img/client-01.jpg">
                        </div>
                    </figure>
                    <aside class="cite">
                        <p>Fusce risus metus, placerat in consectetur eu, porttitor a est sed sed dolor lorem cras adipiscing</p>
                        <footer>Natalie Jenkins</footer>
                    </aside>
                </blockquote>
            </div><!-- /.testimonials-carousel -->
        </div><!-- /.container -->
    </section><!-- /#testimonials -->
    <section id="partners" class="block">
        <div class="container">
            <header class="section-title"><h2>Our Partners</h2></header>
            <div class="logos">
                <div class="logo"><a href=""><img src="{{ url('assets/zoner') }}/img/logo-partner-01.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="{{ url('assets/zoner') }}/img/logo-partner-02.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="{{ url('assets/zoner') }}/img/logo-partner-03.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="{{ url('assets/zoner') }}/img/logo-partner-04.png" alt=""></a></div>
                <div class="logo"><a href=""><img src="{{ url('assets/zoner') }}/img/logo-partner-05.png" alt=""></a></div>
            </div>
        </div><!-- /.container -->
    </section><!-- /#partners -->
</div>
<!-- end Page Content -->
@stop

@section('js_assets')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/markerwithlabel_packed.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/infobox.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.placeholder.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/icheck.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.vanillabox-0.1.5.min.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/tmpl.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/draggable-0.1.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/jquery.slider.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/markerclusterer_packed.js"></script>
<script type="text/javascript" src="{{ url('assets/zoner') }}/js/custom-map.js"></script>
@stop

@section('js_section')
<script>
    _latitude = 48.87;
    _longitude = 2.29;
    createHomepageGoogleMap(_latitude,_longitude);
    $(window).load(function(){
        initializeOwl(false);
    });
</script>
@stop
