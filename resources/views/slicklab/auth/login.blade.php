
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Template">
    <meta name="keywords" content="admin dashboard, admin, flat, flat ui, ui kit, app, web app, responsive">
    <link rel="shortcut icon" href="img/ico/favicon.png">
    <title>Sibangty Administrator Login</title>

    <!--toastr-->
    <link href="{{ url('/assets/'.config('app.backend_template')) }}/js/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

    <!-- Base Styles -->
    <link href="{{ url('/assets/'.config('app.backend_template')) }}/css/style.css" rel="stylesheet">
    <link href="{{ url('/assets/'.config('app.backend_template')) }}/css/style-responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ url('/assets/'.config('app.backend_template')) }}/js/html5shiv.min.js"></script>
    <script src="{{ url('/assets/'.config('app.backend_template')) }}/js/respond.min.js"></script>
    <![endif]-->


</head>

  <body class="login-body">

      <div class="login-logo">
          <img src="{{ url('/assets/'.config('app.backend_template')) }}/img/login_logo.png" alt=""/>
      </div>

      <h2 class="form-heading">login</h2>
      <div class="container log-row">
          {{ Form::open(['class' => 'form-signin']) }}
              <div class="login-wrap">
                  {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your email', 'autofocus' => 'autofocus']) }}

                  {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter your password']) }}

                  <label class="checkbox-custom check-success">
                      {{ Form::checkbox('remember', 'remember-me', false, ['id' => 'checkbox1']) }}
                      <label for="checkbox1">Remember me</label>
                  </label>

                  <button class="btn btn-lg btn-success btn-block" type="submit">LOGIN</button>
              </div>
          {{ Form::close() }}
      </div>

      <!--jquery-1.10.2.min-->
      <script src="{{ url('/assets/'.config('app.backend_template')) }}/js/jquery-1.11.1.min.js"></script>
      <!--Bootstrap Js-->
      <script src="{{ url('/assets/'.config('app.backend_template')) }}/js/bootstrap.min.js"></script>
      <script src="{{ url('/assets/'.config('app.backend_template')) }}/js/jrespond/jRespond.min.js"></script>

      <!--toastr-->
      <script src="{{ url('/assets/'.config('app.backend_template')) }}/js/toastr-master/toastr.js"></script>
      <script src="{{ url('/assets/'.config('app.backend_template')) }}/js/toastr-init.js"></script>

      <script type="text/javascript">

          $(document).ready(function() {
              toastr.options.closeButton = true;
              toastr.options.positionClass = "toast-bottom-right";
              @if(Session::has('success'))
              toastr.success('{{ Session::get("success") }}');
              @endif
              @if(Session::has('warning'))
              toastr.warning('{{ Session::get("warning") }}');
              @endif
              @if(Session::has('failed'))
              toastr.error('{{ Session::get("failed") }}');
              @endif

              @if( $errors->any() )
              @foreach($errors->all() as $error)
              toastr.error('{{ $error }}');
              @endforeach
              @endif
          });

      </script>

  </body>
</html>
