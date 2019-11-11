@extends('layouts.plantilla')
@section('content')

<div class="col-md-12">
        @include('includes.message')
        @include('includes.errors')
<div class="box box-primary">
<div class="box-header with-border">

        <h3>Agencias en el Sistema</h3>
        <a href="" class="btn btn-primary btn-sm pull-right">Registre agencia</a>

</div>
<div class="box-body">

<table class="table table-hover table-bordered">
        <thead>
            <tr>        
                <th>Agencia</th>
                <th>Responsable de Fondo Fijo</th>
                <th>FONDO FIJO ASIGNADO</th>
                <th colspan="3">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agencias as $agencia)
                <tr>
                <td>{{$agencia->agencia}}</td>
                <td>{{$agencia->rff}}</td>
                <td>{{$agencia->fondo}}</td>
                <td><a href="{{route('agencia.editarf',$agencia->id)}}" class="btn btn-primary btn-sm">EDITAR</a></td>
                
                </tr>
            @endforeach


        </tbody>


</table>



</div>
</div>
</div>


@endsection    



