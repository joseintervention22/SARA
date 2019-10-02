<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SARA Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- Bootstrap 3.3.7 -->
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href={{asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}>
<!-- Font Awesome -->
<link rel="stylesheet" href={{asset("bower_components/font-awesome/css/font-awesome.min.css")}}>
<!-- Ionicons -->
<link rel="stylesheet" href={{asset("bower_components/Ionicons/css/ionicons.min.css")}}>
<!-- Theme style -->
<link rel="stylesheet" href={{asset("dist/css/AdminLTE.min.css")}}>
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href={{asset("dist/css/skins/_all-skins.css")}}>
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href={{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}>
<link rel="stylesheet" href="{{asset("css/style.css")}}">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
  <div class="color-overlay">

  </div>
<div class="container">
<div class="login-box">
  <div class="login-logo">
  </div>
  <!-- /.login-logo -->
  <div>
    
    <img src={{asset("images/logosum.png")}} style="height:130px; width:350px;">
    
    <p class="login-box-msg">BIENVENIDOS</p>
    <p class="login-box-msg">Zona Comercial Tehuantepec</p>


    <form action="{{ route('login') }}" method="POST">
      @csrf
    <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
      <label for="username"> RPE</label>
        <input type="username" id="username" name="username" class="form-control" placeholder="RPE" name="username" value="{{ old('username') }}">
        {!! $errors->first('username','<span class="help-block">:message </span>') !!}



      </div>
      <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        <label for="password"><i class="glyphicon glyphicon-tower"></i>  Contraseña</label>
        <input name="password" id="password"type="password" class="form-control" placeholder="Contraseña" value="{{ old('password') }}>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        {!! $errors->first('password','<span class="help-block">:message </span>') !!}
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block">Iniciar Sesion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->
  <a href="{{route('register')}}" class="text-center">Registrese</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div> 
<!-- jQuery 3 -->
<script src={{asset("bower_components/jquery/dist/jquery.min.js")}}></script>
<!-- Bootstrap 3.3.7 -->
<script src={{asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}></script>
<!-- iCheck -->

</body>
</html>
