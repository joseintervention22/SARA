@extends('layouts.plantilla')
@section('content')
@include('includes.message')

<div class="col-md-12">
@if ($errors->any())
@include('includes.errors')
@endif
<div class="box box-primary">
<div class="box-header with-border">
        <h3>Usuarios en el Sistema</h3>
    </div>
<div class="box-body">


<table class="table table-hover table-bordered">
        <thead>
            <tr>        
                <th>Nombre</th>
                <th>Email</th>
                <th>RPE</th>
                <th>Alta</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->created_at}}</td>
                <td><a href="{{route('user.detail',$user->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-envelope"> </span>detalle</a>
                <a href="{{route('user.info',$user->id)}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-envelope"> </span>editar</a>
                </td>
                </tr>


            @endforeach


        </tbody>


</table>
{!! $usuarios->render() !!}



</div>
</div>
</div>


@endsection