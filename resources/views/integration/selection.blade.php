@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
        @if ($errors->any())
            @include('includes.errors')
        @endif
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Seleccione el Arqueo a Integrar</h3>
            </div>
            <div class="box-body">
                    <table class="table table-hover table-bordered">
                            <thead>
                                <tr>        
                                    <th>Agencia</th>
                                    <th>Propietario Fondo Fijo</th>
                                    <th>Mes</th>
                                    <th>Total</th>
                                    <th colspan="3">Integracion</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($selection as $arqueo)
                                <tr>
                                <td>{{$arqueo->agencia->agencia}}</td>
                                <td>{{$arqueo->agencia->rff}}</td>
                                <td>{{$arqueo->mes}}</td>
                                <td>${{$arqueo->total}}</td>
                                <td>
                                <form action="{{route('integration.create')}}" method="get">
                                
                                <input name="id" id="id" type="hidden" value="{{$arqueo->id}}">
                                <input name="inicio" id="inicio" type="hidden" value="{{$inicio}}">
                                <input name="fin" id="fin" type="hidden" value="{{$fin}}">

                                <button class="btn btn-primary btn-xs" type="submit">Enviar</button>
                                </form>



                                </td>
                                </tr>
                            @endforeach
            
                            </tbody>
                    </table>
            









            </div>
        </div>
</div>
@endsection