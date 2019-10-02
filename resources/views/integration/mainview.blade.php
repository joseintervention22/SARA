@extends('layouts.plantilla')
@section('content')
<div class="col-md-12">
    @if ($errors->any())
        @include('includes.errors')
    @endif
    @include('includes.message')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Integracion del Fondo</h3>
            <a href="{{route('integration.range')}}" class="btn btn-sm btn-primary pull-right">Registrar nuevo</a>
        </div>
        <div class="box-body">

            <table class="table table-hover">
                    <thead>
                            <tr>        
                                <th>Efectivo</th>
                                <th>Cheques</th>
                                <th>Comprobado</th>
                                <th>Diferencia</th>
                                <th>Agencia</th>
                                <th>fecha</th>
                                <th colspan="3">pdf</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($integraciones as $integration)

                                <tr>
                                    
                                        <td>{{$integration->importefec}}</td>
                                        <td>{{$integration->importeche}}</td>
                                        <td>{{$integration->comprobado}}</td>
                                        <td>{{$integration->diferencia}}</td>
                                        <td>{{$integration->arqueo->agencia->agencia}}</td>
                                        <td>{{$integration->created_at}}</td>
                                <td>  <a href="{{route('exporta.pdf',$integration->id)}}" class="btn btn-primary btn-xs" target="_blank"> PDF</a>   </td>






                                </tr>
                                @endforeach

                        </tbody>


            </table>



        </div>
    </div>
</div>
@endsection