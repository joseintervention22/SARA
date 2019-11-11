<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creacion de reembolso</title>
</head>
<body>
        <p>Nuevo Reembolso Registrado Exitosamente</p>
        <p> estos son algunos datos del reembolso</p>
        <ul>
        <li>Reembolso Consecutivo: {{$reembolso->consecutivo}}</li>
         <li>REGISTRO: {{$reembolso->user->name}} {{$reembolso->user->username}}</li>
         <li>Agencia: {{$reembolso->agencia->agencia}} </li>
         <li>Reesponsable de fondo fijo: {{$reembolso->agencia->rff}}</li>
         <li>Concepto de devolucion: {{$reembolso->concepto}}</li>
         <li>Importe: ${{$reembolso->importe}}</li>
         <li> <a href="" class="btn btn-success"> ir al sistema</a> </li>
        </ul>
</body>
</html>