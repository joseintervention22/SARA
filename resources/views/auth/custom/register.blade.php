<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro SARA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
<link rel="stylesheet" href="{{asset("css/style-register.css")}}">
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
        <div class="color-overlay"></div>
        <div class="container">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div>
    <p class="login-box-msg">Register a new membership</p>

  <form action="{{route('register')}}" method="POST">

    @csrf
    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
          <label for="name"><i class="glyphicon glyphicon-user"></i> Nombre</label>
      <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" value="{{old('name')}}" >
      {!! $errors->first('name','<span class="help-block">:message </span>') !!}    
    </div>

    <div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
            <label for="username"><i class="glyphicon glyphicon-user"></i> RPE</label>
        <input id="username" name="username" type="text" class="form-control" placeholder="RPE" value="{{old('username')}}" required autofocus>
        {!! $errors->first('username','<span class="help-block">:message </span>') !!}    
    </div>



    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
            <label for="name"><i class="glyphicon glyphicon-envelope"></i> Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Correo electronico" required autofocus>
        {!! $errors->first('email','<span class="help-block">:message </span>') !!}    
    </div>

      <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        <label for="password"><i class="glyphicon glyphicon-lock"></i> Contraseña</label>
        <input name="password" id="password" type="password" class="form-control" placeholder="Contraseña" required autofocus>
        {!! $errors->first('password','<span class="help-block">:message </span>') !!}    

    </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirme su Contraseña" id="password-confirm" name="password_confirmation">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-info btn-block btn-flat">Registrarse</button>
        </div>
        <!-- /.col -->
      </div>
    </div>
    </form>

   

<a href="{{route('login')}}" class="text-center">Iniciar sesion con una cuenta</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<!-- jQuery 3 -->
<script src={{asset("bower_components/jquery/dist/jquery.min.js")}}></script>
<!-- Bootstrap 3.3.7 -->
<script src={{asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}></script>
<!-- iCheck -->

</body>
</html>
