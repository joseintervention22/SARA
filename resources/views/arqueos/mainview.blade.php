@extends('layouts.plantilla')
@section('content')
@include('includes.message')
@if ($errors->any())
@include('includes.errors')
@endif
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header with-border">
        <h3 class="box-title">Arqueos de caja que ha registrado</h3>
<a href="{{route('arqueo.index')}}" class="btn btn-sm btn-primary pull-right">Registrar nuevo</a>
</div>
<div class="box-body">
        <table class="table table-hover table-bordered">
                <thead>
                    <tr>        
                        <th>Agencia</th>
                        <th>Propietario Fondo Fijo</th>
                        <th>Mes</th>
                        <th>efectivo</th>
                        <th>Cheques</th>
                        <th>Total</th>
                        <th>Registro</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($arqueos as $arqueo)
                    <tr>
                    <td>{{$arqueo->agencia->agencia}}</td>
                    <td>{{$arqueo->agencia->rff}}</td>
                    <td>{{$arqueo->mes}}</td>
                    <td>${{$arqueo->total_efectivo}}</td>
                    <td>${{$arqueo->total_cheques}}</td>
                    <td>${{$arqueo->total}}</td>
                    <td>{{$arqueo->user->username}} {{$arqueo->user->name}}</td>
                    </tr>
                @endforeach

                </tbody>
        </table>




</div>
</div>
</div>
@endsection