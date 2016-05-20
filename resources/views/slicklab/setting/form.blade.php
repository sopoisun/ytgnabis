@extends('slicklab.layout')

@section('css_assets')
<!--  wysihtml5 -->
<link href="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet">
@stop

@section('content')
<!-- page head start-->
<div class="page-head">
    <h3 class="m-b-less">
        Create new product
    </h3>
    <!--<span class="sub-title">Welcome to Static Table</span>-->
    <div class="state-information">
        <ol class="breadcrumb m-b-less bg-less">
            <li><a href="#">Home</a></li>
            <li class="active">Setting</li>
        </ol>
    </div>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">

    <div class="row">

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Web Setting
                </header>
                <div class="panel-body">
                    {!! Form::model($setting, ['role' => 'form', 'class' => 'form-horizontal']) !!}
                        <div class="form-group @if($errors->has('phone')) has-error @endif">
                            <label for="phone" class="col-lg-3 col-sm-3 control-label">Phone</label>
                            <div class="col-lg-6">
                                {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Enter phone here']) }}
                                @if($errors->has('phone'))<span class="help-block">{{ $errors->first('phone') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('email')) has-error @endif">
                            <label for="email" class="col-lg-3 col-sm-3 control-label">Email</label>
                            <div class="col-lg-6">
                                {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter email here']) }}
                                @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('facebook')) has-error @endif">
                            <label for="facebook" class="col-lg-3 col-sm-3 control-label">Facebook</label>
                            <div class="col-lg-6">
                                {{ Form::text('facebook', null, ['class' => 'form-control', 'id' => 'facebook', 'placeholder' => 'Enter facebook here']) }}
                                @if($errors->has('facebook'))<span class="help-block">{{ $errors->first('facebook') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('twitter')) has-error @endif">
                            <label for="twitter" class="col-lg-3 col-sm-3 control-label">Twitter</label>
                            <div class="col-lg-6">
                                {{ Form::text('twitter', null, ['class' => 'form-control', 'id' => 'twitter', 'placeholder' => 'Enter twitter here']) }}
                                @if($errors->has('twitter'))<span class="help-block">{{ $errors->first('twitter') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('g_plus')) has-error @endif">
                            <label for="g_plus" class="col-lg-3 col-sm-3 control-label">Google plus</label>
                            <div class="col-lg-6">
                                {{ Form::text('g_plus', null, ['class' => 'form-control', 'id' => 'g_plus', 'placeholder' => 'Enter G plus here']) }}
                                @if($errors->has('g_plus'))<span class="help-block">{{ $errors->first('g_plus') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('youtube')) has-error @endif">
                            <label for="youtube" class="col-lg-3 col-sm-3 control-label">Youtube chanel</label>
                            <div class="col-lg-6">
                                {{ Form::text('youtube', null, ['class' => 'form-control', 'id' => 'youtube', 'placeholder' => 'Enter youtube here']) }}
                                @if($errors->has('youtube'))<span class="help-block">{{ $errors->first('youtube') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('instagram')) has-error @endif">
                            <label for="instagram" class="col-lg-3 col-sm-3 control-label">Instagram</label>
                            <div class="col-lg-6">
                                {{ Form::text('instagram', null, ['class' => 'form-control', 'id' => 'instagram', 'placeholder' => 'Enter instagram here']) }}
                                @if($errors->has('instagram'))<span class="help-block">{{ $errors->first('instagram') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('map_latitude')) has-error @endif">
                            <label for="map_latitude" class="col-lg-3 col-sm-3 control-label">Map Latitude</label>
                            <div class="col-lg-6">
                                {{ Form::text('map_latitude', null, ['class' => 'form-control', 'id' => 'map_latitude', 'readonly' => 'readonly', 'placeholder' => 'Enter map latitude here']) }}
                                @if($errors->has('map_latitude'))<span class="help-block">{{ $errors->first('map_latitude') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('map_longitude')) has-error @endif">
                            <label for="map_longitude" class="col-lg-3 col-sm-3 control-label">Map Longitude</label>
                            <div class="col-lg-6">
                                {{ Form::text('map_longitude', null, ['class' => 'form-control', 'id' => 'map_longitude', 'readonly' => 'readonly', 'placeholder' => 'Enter map longitude here']) }}
                                @if($errors->has('map_longitude'))<span class="help-block">{{ $errors->first('map_longitude') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('alamat')) has-error @endif">
                            <label for="alamat" class="col-lg-3 col-sm-3 control-label">Alamat</label>
                            <div class="col-lg-6">
                                {{ Form::textarea('alamat', null, ['class' => 'form-control wysihtml5', 'id' => 'alamat', 'rows' => 3, 'placeholder' => 'Enter alamat']) }}
                                @if($errors->has('alamat'))<span class="help-block">{{ $errors->first('alamat') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('about_us')) has-error @endif">
                            <label for="about_us" class="col-lg-3 col-sm-3 control-label">About Us</label>
                            <div class="col-lg-6">
                                {{ Form::textarea('about_us', null, ['class' => 'form-control wysihtml5', 'id' => 'about_us', 'rows' => 3, 'placeholder' => 'Enter about us']) }}
                                @if($errors->has('about_us'))<span class="help-block">{{ $errors->first('about_us') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {{ Form::hidden('state', isset($product) ? 'old' : 'new') }}
                                <button type="submit" class="btn btn-info btnSubmit">Save</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Map for set latitude and longitude
                </header>
                <div class="panel-body">
                    <div id="map" class="gmaps"></div>
                </div>
            </section>
        </div>
    </div>

</div>
<!--body wrapper end-->
@stop

@section('js_assets')
<!--bootstrap-wysihtml5-->
<script src="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<!-- Map -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="{{ url('/assets/'.config('app.backend_template')) }}/js/gmaps.js"></script>
@stop

@section('js_section')
<script>
    $('.wysihtml5').wysihtml5();

    // Default to blambangan location
    var defLat  = {{ old('map_latitude') ? old('map_latitude') : $setting->map_latitude }};
    var defLong = {{ old('map_longitude') ? old('map_longitude') : $setting->map_longitude }};

    var map = new GMaps({
        div: '#map',
        lat: defLat,
        lng: defLong,
        zoom: 16,
    });

    map.setCenter(defLat, defLong);

    map.addMarker({
        lat: defLat,
        lng: defLong,
        draggable: true,
        dragend: function(e) {
            var location = {
                lat: e.latLng.lat(),
                long: e.latLng.lng()
            };
            //console.log(location);
            $("#map_latitude").val(location.lat);
            $("#map_longitude").val(location.long);
        }
    });
</script>
@stop
