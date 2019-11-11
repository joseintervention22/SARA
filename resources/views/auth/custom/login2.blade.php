<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login CFE-SARA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href={{asset("images/icons/favicon.ico")}}/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("vendor/bootstrap/css/bootstrap.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("vendor/animate/animate.css")}}>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href={{asset("vendor/css-hamburgers/hamburgers.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("vendor/animsition/css/animsition.min.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("vendor/select2/select2.min.css")}}>
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href={{asset("vendor/daterangepicker/daterangepicker.css")}}>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href={{asset("css/util.css")}}>
	<link rel="stylesheet" type="text/css" href={{asset("css/main.css")}}>
<!--===============================================================================================-->
<style>
.logo{
	margin-left: 70px;
	margin-top: -120px;
	width: 300px;


}
</style>
</head>
<body style="background-color: #ffffff;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					<img class="logo" src="images/miu.png" alt="">
					<span class="login100-form-title p-b-43">
                    Iniciar Sesion    
					</span>
					@csrf

					
					
					<div class="wrap-input100 validate-input" data-validate = "Por favor introduzca un RPE valido">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100"></span>
                        <span class="label-input100">RPE</span>
                        {!! $errors->first('username','<span class="help-block">:message </span>') !!}

					</div>
					
					
					<div class="wrap-input100 validate-input {{$errors->has('password') ? 'has-error' : ''}}" data-validate="Ingrese una contraseña valida">
						<input class="input100" type="password" name="password" id="password">
                        <span class="focus-input100"></span>
                        {!! $errors->first('password','<span class="help-block">:message </span>') !!}
						<span class="label-input100">Contraseña</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						

						<div>
							<a href="{{route('register')}}" class="txt1">
								REGISTRESE
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Entrar
						</button>
					</div>
					
					
				</form>

				<div class="login100-more" style="background-image: url('images/electricidad.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src={{asset("vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("vendor/animsition/js/animsition.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("vendor/bootstrap/js/popper.js")}}></script>
	<script src={{asset("vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("vendor/select2/select2.min.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("vendor/daterangepicker/moment.min.js")}}></script>
	<script src={{asset("vendor/daterangepicker/daterangepicker.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("vendor/countdowntime/countdowntime.js")}}></script>
<!--===============================================================================================-->
	<script src={{asset("js/main.js")}}></script>

</body>
</html>